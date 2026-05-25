<?php

namespace Vanguard\Http\Controllers\Koshk;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;

use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;

use Laravel\Socialite\Contracts\User as SocialUser;

use Socialite;

use Facebook\Facebook;

class FBController extends Controller
{
    //

    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var RoleRepository
     */
    private $roles;

    public function __construct(UserRepository $users, RoleRepository $roles)
    {
        $this->middleware('guest');

        $this->users = $users;
        $this->roles = $roles;
    }


    /**
     * Get user from authentication provider.
     *
     * @param $provider
     * @return SocialUser
     */
    private function getUserFromFacebook()
    {
        $fb = new Facebook([
		  'app_id' => '170161316509571',
		  'app_secret' => '92fcf6d4ac1dc115b01755afaacd4f9f',
		  'default_graph_version' => 'v2.2',
		  ]);

		$helper = $fb->getCanvasHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		if (! isset($accessToken)) {

		  $fb2 = new Facebook([
		  'app_id' => '170161316509571',
		  'app_secret' => '92fcf6d4ac1dc115b01755afaacd4f9f',
		  'default_graph_version' => 'v2.2',
		  ]);

		  //echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
		  $helper2 = $fb2->getRedirectLoginHelper();

		  $permissions = ['email']; // Optional permissions
		  $loginUrl = $helper2->getLoginUrl('https://apps.facebook.com/hitsevenapp', $permissions);

		  //return Redirect::to($loginUrl);
		  //echo $loginUrl;

		  echo '<a href='.$loginUrl.' target="_blank">Please login ...</a>';

		  exit;
		  //header("Location: ".$loginUrl);
		  //return redirect()->to($loginUrl);
		  //exit;
		} 
		else
		{
			$userbytoken = Socialite::driver('facebook')->userFromToken($accessToken);
			//dd($userbytoken);
			return $userbytoken;
		}

		// Logged in
		// echo '<h3>Signed Request</h3>';
		// var_dump($helper->getSignedRequest());

		// echo '<h3>Access Token</h3>';
		// var_dump($accessToken->getValue());

		// try {
		//   // Returns a `Facebook\FacebookResponse` object
		//   $response = $fb->get('/me?fields=id,name,first_name, last_name', $accessToken->getValue());
		// } catch(Facebook\Exceptions\FacebookResponseException $e) {
		//   echo 'Graph returned an error: ' . $e->getMessage();
		//   exit;
		// } catch(Facebook\Exceptions\FacebookSDKException $e) {
		//   echo 'Facebook SDK returned an error: ' . $e->getMessage();
		//   exit;
		// }

		// $user = $response->getGraphUser();

		// return redirect()->route('home', ['book' => 11, 'id' => 7, 'fname' => $user['first_name'], 'fid' => $user['id'], 'lname' => $user['last_name'] ]);
    }


    /**
     * Handle response authentication provider.
     *
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleCanvasCallback(Request $request)
    {

    	//dd($request); 
    	$provider = 'facebook';
    	//$this->redirectToProvider($provider);

    	$socialUser = $this->getUserFromFacebook();
    	/*
    	if(!$socialUser->getId())
    	{
    		return redirect('login')->withErrors(trans('app.only_users_with_account_can_login'));
    		exit;
    	}
    	*/

    	$fid = $socialUser->getId();

        $user = $this->users->findBySocialId('facebook', $socialUser->getId());

        if (! $user) {
            if (! settings('reg_enabled')) {
                return redirect('login')->withErrors(trans('app.only_users_with_account_can_login'));
            }

            // Only allow missing email from Twitter provider
            if (! $socialUser->getEmail()) {
                return strtolower($provider) == 'twitter'
                    ? $this->handleMissingEmail($socialUser)
                    : redirect('login')->withErrors(trans('app.you_have_to_provide_email'));
            }

            $user = $this->createOrAssociateAccountForUser($socialUser, $provider);
        }

       	//dd($user);

		$request->session()->put('currentUser', $user);

       	$data = $request->session()->all();

       	//dd($fid);

       	return redirect()->route('home', ['book' => 11, 'id' => 7, 'fname' => $user['first_name'], 'fid' => $fid, 'lname' => $user['last_name'], 'data' => 0 ]);

        //return $this->loginAndRedirect($user);
    }

    /**
     * Create account for user authenticated via social network.
     * If user with the same email address retrieved from social network
     * exists in our database, just associate it with provided social account.
     *
     * @param SocialUser $socialUser
     * @param $provider
     * @return \Vanguard\User
     */
    private function createOrAssociateAccountForUser(SocialUser $socialUser, $provider)
    {
        $user = $this->users->findByEmail($socialUser->getEmail());

        if (! $user) {
            // User with email retrieved from social auth provider does not
            // exist in our database. That means that we have to create new user here
            list($firstName, $lastName) = $this->parseUserFullName($socialUser);

            $role = $this->roles->findByName('User');

            $user = $this->users->create([
                'email' => $socialUser->getEmail(),
                'password' => str_random(10),
                'first_name' => $firstName,
                'last_name' => $lastName,
                'status' => UserStatus::ACTIVE,
                'avatar' => $socialUser->getAvatar(),
                'role_id' => $role->id
            ]);

            $this->users->updateSocialNetworks($user->id, []);
        }

        // Associate social account with user account inside our application
        $this->users->associateSocialAccountForUser($user->id, $provider, $socialUser);

        return $user;
    }


    /**
     * Parse User's name from his social network account.
     *
     * @param SocialUser $user
     * @return array
     */
    private function parseUserFullName(SocialUser $user)
    {
        $name = $user->getName();

        if (strpos($name, " ") !== false) {
            return explode(" ", $name, 2);
        }

        return [$name, ''];
    }

        /**
     * Redirect user to page where he can provide an email,
     * since email is not provided inside oAuth response.
     *
     * @param $socialUser
     * @return \Illuminate\Http\RedirectResponse
     */
    private function handleMissingEmail($socialUser)
    {
        Session::put('social.user', $socialUser);

        return redirect()->to('auth/twitter/email');
    }
}
