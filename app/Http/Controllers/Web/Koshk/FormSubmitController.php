<?php

namespace Vanguard\Http\Controllers\Web\Koshk;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;


use Auth;
use Vanguard\Repositories\Activity\ActivityRepository;
use Vanguard\Repositories\Country\CountryRepository;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\Session\SessionRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Services\Upload\UserAvatarManager;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\User;


class FormSubmitController extends Controller
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

    public function index(Request $request)
    {
    	$prod_name = $request->get('producer');
    	$activity_name = $request->get('activity');
    	


    	$currentProducer = DB::table('producer')->get()->where('alias', strtolower($prod_name));
        $currentActivity = DB::table('activity')->get()->where('alias', strtolower($activity_name));

        $user = $this->theUser;

        //dd($user);
        //dd($currentProducer->first()->id);
        if($currentActivity->count() > 0 && $currentProducer->count() > 0 )
        {
            if ($currentProducer->first()->id == $currentActivity->first()->producer_id)
            {
        	   return view('koshk.activity.'.$currentProducer->first()->alias.'.'.$currentActivity->first()->alias, compact('currentProducer', 'currentActivity','user'));
            }
            else
                echo 'event not matching producer';
        }
        else
            echo 'no event with that name';


    }

	  public function showUploadFile(Request $request)
	  {


	  
	  $file = $request->file('file');

	  //Display File Name
	  echo 'File Name: '.$file->getClientOriginalName();
	  echo '<br>';

	  //Display File Extension
	  echo 'File Extension: '.$file->getClientOriginalExtension();
	  echo '<br>';

	  //Display File Real Path
	  echo 'File Real Path: '.$file->getRealPath();
	  echo '<br>';

	  //Display File Size
	  echo 'File Size: '.$file->getSize();
	  echo '<br>';

	  //Display File Mime Type
	  echo 'File Mime Type: '.$file->getMimeType();

	  //Move Uploaded File
	  $destinationPath = 'uploads';
	  $file->move($destinationPath,$file->getClientOriginalName());
   }
}
