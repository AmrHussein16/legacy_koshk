<?php

namespace Vanguard\Http\Controllers\Web\Koshk;

use Vanguard\Repositories\Country\CountryRepository;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Input;
use Response;
use Vanguard\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProducerController
 * @package Vanguard\Http\Controllers\Koshk
 */
class ProducerController extends Controller
{
    /**
     * @var User
     */
    protected $theUser;

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
    public function index()
    {
        $user = $this->theUser;
        $producers = DB::table('producer')->get()->where('id', '!=', 6);

        return view('front.producers.producers', compact('producers', 'user'));
    }

    public function producer(Request $request, $prod_name)
    {
        $currentProducer = DB::table('producer')->where('alias', strtolower($prod_name))->get();
        $activities = DB::table('activity')->where('producer_id', $currentProducer->first()->id)->get();

        $user = $this->theUser;

        $followStatus = DB::table('followproducer')->where(
            [
                ['producer_id', '=', $currentProducer->first()->id],
                ['user_id', '=', $user['id']]
            ]
        )->get();

        if ($followStatus->count() <= 0) /// there is NO  entry already
        {
            $producer_id = $currentProducer->first()->id;
            $user_id = $user['id'];
            DB::table('followproducer')->insert(
                ['producer_id' => $producer_id, 'user_id' => $user_id, 'status' => false]
            );
            $following = false;
        } else {
            $following = $followStatus->first()->status;
        }

        return view('front.producers.producer', compact('currentProducer', 'user', 'following', 'activities'));
    }

    /**
     * handle data posted by ajax request
     */
    public function follow(Request $request)
    {
        $producer_id = $request->producer_id;
        $user_id = \Auth::id();

        $followStatus = DB::table('followproducer')->where(
            [
                ['producer_id', '=', $producer_id],
                ['user_id', '=', $user_id]
            ]
        )->get();

        if ($followStatus->count() > 0) /// there is an entry already
        {
            $newStatus = !($followStatus->first()->status);

            DB::table('followproducer')
                ->where(['producer_id' => $producer_id, 'user_id' => $user_id])
                ->update(['status' => $newStatus]);

            /* $response = array(
                'producer_id' => $producer_id,
                'user_id' => $user_id,
                'status' => $newStatus,
            ); */
        } else  /// No entry ...
        {
            DB::table('followproducer')->insert(
                ['producer_id' => $producer_id, 'user_id' => $user_id, 'status' => true]
            );

            /* $response = array(
                'producer_id' => $producer_id,
                'user_id' => $user_id,
                'status' => true,
            ); */
        }

        return redirect()->back();
        // return Response::json($response);
    }


    public function activity(Request $request, $prod_name, $activity_name)
    {
        $currentProducer = DB::table('producer')->get()->where('alias', strtolower($prod_name));
        $currentActivity = DB::table('activity')->get()->where('alias', strtolower($activity_name));

        $user = $this->theUser;

        if (
            $currentActivity->count() <= 0 ||
            $currentProducer->count() <= 0 ||
            $currentProducer->first()->id != $currentActivity->first()->producer_id
        ) {
            abort(404);
        }

        // FIXME:: make dynamic views for each activity
        return view('koshk.activity.' . $currentProducer->first()->alias . '.' . $currentActivity->first()->alias, compact('currentProducer', 'currentActivity', 'user'));
    }

    public function submit(Request $request, $prod_name, $activity_name)
    {
        $user = $this->theUser;

        $currentProducer = DB::table('producer')->get()->where('alias', strtolower($prod_name));
        $currentActivity = DB::table('activity')->get()->where('alias', strtolower($activity_name));

        $details = array("storytitletext" => $request->get('storytitletext'), "storytext" => $request->get('storytext'), "storyfile" => $request->get('storyfile'));

        $submission_id = DB::table('submission')->insertGetId(
            [
                'user_id' => $user['id'],
                'activity_id' => $currentActivity->first()->id,
                'response' => 'submit',
                'details' => json_encode($details)
            ]
        );

        foreach (['IconImage', 'FeatureImage', 'Story'] as $file) {
            $the_file = $request->file($file);
            if ($the_file) {
                $the_file->storeAs('content/producer/' . $prod_name . '/activities/' . $activity_name . '/' . $user['id'], 'ID_' . $submission_id . '_' . $file . '_' . date('Y_m_d_H_i_s_') . $the_file->getClientOriginalName());
            }
        }

        // FIXME:: fix the view to more dynamic one
        return view('koshk.activity.submission', compact('currentProducer', 'currentActivity', 'user'));
    }

    public function challenge(Request $request, $prod_name, $activity_name, $challenge_name)
    {
        echo 'challenge             ' . $prod_name . '   ' . $activity_name . '   ' . $challenge_name;

        dd($request);

        echo 'created object';
    }
}
