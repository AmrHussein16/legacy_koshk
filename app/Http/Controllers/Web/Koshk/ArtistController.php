<?php

namespace Vanguard\Http\Controllers\Web\Koshk;

use Vanguard\Events\User\ChangedAvatar;
use Vanguard\Events\User\TwoFactorDisabled;
use Vanguard\Events\User\TwoFactorEnabled;
use Vanguard\Events\User\UpdatedProfileDetails;
use Vanguard\Http\Requests\User\EnableTwoFactorRequest;
use Vanguard\Http\Requests\User\UpdateProfileDetailsRequest;
use Vanguard\Http\Requests\User\UpdateProfileLoginDetailsRequest;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Repositories\Activity\ActivityRepository;
use Vanguard\Repositories\Country\CountryRepository;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\Session\SessionRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Services\Upload\UserAvatarManager;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\User;
use Auth;
use Authy;
use Illuminate\Http\Request;

use Session;
use Input;
use Response; 


use Vanguard\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

//use Illuminate\Support\Facades\Input;

/**
 * Class ArtistController
 * @package Vanguard\Http\Controllers\Koshk
 */
class ArtistController extends Controller
{
    /**
     * @var User
     */
    protected $theUser;
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * UsersController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->middleware('auth');
        $this->middleware('session.database', ['only' => ['sessions', 'invalidateSession']]);

        $this->users = $users;

        $this->middleware(function ($request, $next) {
            $this->theUser = Auth::user();
            return $next($request);  
        });
    }

    /**
     * Display user's profile page.
     *
     * @param RoleRepository $rolesRepo
     * @param CountryRepository $countryRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(RoleRepository $rolesRepo, CountryRepository $countryRepository)
    {

        $user = $this->theUser;
        $edit = true;
        $roles = $rolesRepo->lists();
        $socials = $user->socialNetworks;
        $countries = [0 => 'Select a Country'] + $countryRepository->lists()->toArray();
        $socialLogins = $this->users->getUserSocialLogins($this->theUser->id);
        $statuses = UserStatus::lists();

        $user = $this->theUser;

        $artists = DB::table('artist')->get();

        //dd($artists);
        return view('koshk.artists', compact('artists', 'user'));

    }

    public function artist(Request $request, $artist_name)
    {
        $currentArtist = DB::table('artist')->get()->where('alias', strtolower($artist_name));
        $activities = DB::table('artistactivity')->get()->where('artist_id', $currentArtist->first()->id);

        //dd($activities);
        //echo $activities->count();
    	
        //echo 'artist             '.$artist_name;

        $user = $this->theUser;

        $followStatus = DB::table('followartist')->where([
          ['artist_id', '=', $currentArtist->first()->id],
          ['user_id', '=', $user['id']]
        ]
        )->get();

        if($followStatus->count() <= 0) /// there is NO  entry already
        {
          $artist_id = $currentArtist->first()->id;
          $user_id = $user['id'];
          DB::table('followartist')->insert(
              ['artist_id' => $artist_id, 'user_id' => $user_id, 'status' => false]
          );
          $following = false;
        } else {
          $following = $followStatus->first()->status;
        }

    	//dd($currentArtist);

       return view('koshk.artist', compact('currentArtist', 'user', 'following', 'activities'));  

    }

    /**
     * handle data posted by ajax request
     */
    public function follow() {

        //check if its our form
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt to create setting'
            ) );
        }
 
        $artist_id = Input::get( 'artist_id' );
        $user_id = Input::get( 'user_id' );


        $followStatus = DB::table('followartist')->where([

          ['artist_id', '=', $artist_id],
          ['user_id', '=', $user_id]
        ]
        )->get();

          $response = array(
              'artist_id' => $artist_id,
              'user_id' => $user_id,
              'status' => true,
          );

 
        if($followStatus->count() > 0) /// there is an entry already
        {
          $newStatus = !($followStatus->first()->status);

          DB::table('followartist')
            ->where(['artist_id' => $artist_id, 'user_id' => $user_id])
            ->update(['status' => $newStatus]);

          $response = array(
            'artist_id' => $artist_id,
            'user_id' => $user_id,
            'status' => $newStatus,
          );
        } 
        else  /// No entry ... 
        {

          DB::table('followartist')->insert(
              ['artist_id' => $artist_id, 'user_id' => $user_id, 'status' => true]
          );
   
          $response = array(
              'artist_id' => $artist_id,
              'user_id' => $user_id,
              'status' => true,
          );
        }

        return Response::json( $response );
    }

}
