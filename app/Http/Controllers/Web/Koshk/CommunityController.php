<?php

namespace Vanguard\Http\Controllers\Web\Koshk;

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
 * Class CommunityController
 * @package Vanguard\Http\Controllers\Koshk
 */
class CommunityController extends Controller
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
     * Display communities's page.
     *
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function index()
    {
        $user = $this->theUser;
        $communities = DB::table('community')->get();

        return view('front.communities.communities', compact('communities', 'user'));
    }

    public function community(Request $request, $comm_name)
    {
        $currentCommunity = DB::table('community')->get()->where('alias', strtolower($comm_name));
        $activities = DB::table('commactivity')
            ->where('community_id', $currentCommunity->first()->id)
            ->get();

        $followers = DB::table('users')
            ->join('followcommunity', 'users.id', '=', 'followcommunity.user_id')
            ->select('users.*')
            ->where([
                ['followcommunity.community_id', $currentCommunity->first()->id],
                ['followcommunity.status', 1]
            ])
            ->get();

        $user = $this->theUser;

        $followStatus = DB::table('followcommunity')->where(
            [
                ['community_id', '=', $currentCommunity->first()->id],
                ['user_id', '=', $user['id']]
            ]
        )->get();

        if ($followStatus->count() <= 0) /// there is NO  entry already
        {
            $community_id = $currentCommunity->first()->id;
            $user_id = $user['id'];
            DB::table('followcommunity')->insert(
                ['community_id' => $community_id, 'user_id' => $user_id, 'status' => false]
            );
            $following = false;
        } else {
            $following = $followStatus->first()->status;
        }

        return view('front.communities.community', compact('currentCommunity', 'user', 'following', 'activities', 'followers'));
    }

    /**
     * handle data posted by ajax request
     */
    public function follow(Request $request)
    {
        $community_id = $request->community_id;
        $user_id = \Auth::id();

        $followStatus = DB::table('followcommunity')->where(
            [
                ['community_id', '=', $community_id],
                ['user_id', '=', $user_id]
            ]
        )->get();

        if ($followStatus->count() > 0) /// there is an entry already
        {
            $newStatus = !($followStatus->first()->status);

            DB::table('followcommunity')
                ->where(['community_id' => $community_id, 'user_id' => $user_id])
                ->update(['status' => $newStatus]);

            /* $response = array(
                'community_id' => $community_id,
                'user_id' => $user_id,
                'status' => $newStatus,
            ); */
        } else  /// No entry ...
        {
            DB::table('followcommunity')->insert(
                ['community_id' => $community_id, 'user_id' => $user_id, 'status' => true]
            );

            /* $response = array(
                'community_id' => $community_id,
                'user_id' => $user_id,
                'status' => true,
            ); */
        }

        return redirect()->back();
        // return Response::json($response);
    }


    public function activity(Request $request, $comm_name, $activity_name)
    {

        $currentCommunity = DB::table('community')->where('alias', strtolower($comm_name))->get();
        $currentActivity = DB::table('commactivity')->where('alias', strtolower($activity_name))->get();

        if (
            $currentActivity->count() <= 0 ||
            $currentCommunity->count() <= 0 ||
            $currentCommunity->first()->id != $currentActivity->first()->community_id
        ) {
            abort(404);
        }

        // FIXME: make one view and more depend on DB
        $view_name = 'front.communities.activity' .
            ($currentActivity->first()->alias == 'ww3' ?
                '.' . $currentCommunity->first()->alias . '.' . $currentActivity->first()->alias
                : ''
            );

        return view($view_name, compact('currentCommunity', 'currentActivity'));
    }

    public function submit(Request $request, $comm_name, $activity_name)
    {

        $IconImage = $request->file('IconImage');
        $FeatureImage = $request->file('FeatureImage');
        $Story = $request->file('Story');

        $user = $this->theUser;

        //Move Uploaded File
        $destinationPath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . 'content/community/' . $comm_name . '/activities/' . $activity_name . '/' . $user['id'];


        if (!Storage::exists($destinationPath)) {
            Storage::makeDirectory($destinationPath);
        }


        $currentCommunity = DB::table('community')->get()->where('alias', strtolower($comm_name));
        $currentActivity = DB::table('activity')->get()->where('alias', strtolower($activity_name));

        $userid = $user['id'];
        $activity_id = $currentActivity->first()->id;

        $details = array("storytitletext" => $request->get('storytitletext'), "storytext" => $request->get('storytext'), "storyfile" => $request->get('storyfile'));


        $json_details = json_encode($details);

        $submission_id = DB::table('submission')->insertGetId(
            [
                'user_id' => $userid,
                'activity_id' => $activity_id,
                'response' => 'submit',
                'details' => $json_details
            ]
        );

        $IconImage->move($destinationPath, 'ID_' . $submission_id . '_IconImage_' . date('Y_m_d_H_i_s_') . $IconImage->getClientOriginalName());
        $FeatureImage->move($destinationPath, 'ID_' . $submission_id . '_FeatureImage_' . date('Y_m_d_H_i_s_') . $FeatureImage->getClientOriginalName());
        $Story->move($destinationPath, 'ID_' . $submission_id . '_Story_' . date('Y_m_d_H_i_s_') . $Story->getClientOriginalName());

        return view('koshk.activity.submission', compact('currentCommunity', 'currentActivity', 'user', 'result'));
    }

    public function challenge(Request $request, $comm_name, $activity_name, $challenge_name)
    {
        echo 'challenge             ' . $comm_name . '   ' . $activity_name . '   ' . $challenge_name;

        dd($request);

        echo 'created object';
    }
}
