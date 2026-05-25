<?php

namespace Vanguard\Http\Controllers\Web;

use Vanguard\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StartController extends Controller
{
    /**
     * Displays dashboard based on user's role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        return view('koshk.start');
    }

    /**
     * Displays dashboard based on user's role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function test()
    {
        $currentCommunity = DB::table('community')->get()->where('alias', 'koshk');
        $currentActivity = DB::table('commactivity')->get()->where('alias', 'ww3');

        $user = $this->theUser;

        //dd($currentCommunity->first()->id);
        if ($currentActivity->count() > 0 && $currentCommunity->count() > 0) {
            if ($currentCommunity->first()->id == $currentActivity->first()->community_id) {
                if ($currentActivity->first()->alias == 'ww3') {
                    return view('koshk.test', compact('currentCommunity', 'currentActivity', 'user'));
                } else {
                    return view('koshk.activity', compact('currentCommunity', 'currentActivity', 'user'));
                }
            } else
                echo 'event not matching community';
        } else
            echo 'no event with that name';

        return view('koshk.test', compact('book', 'count'));
    }

    public function acstart()
    {
        $activities = DB::table('commactivity')->get()->where('community_id', '1');

        $producers = DB::table('producer')->get();

        $book = 1;
        $count = 1;

        return view('koshk.acstart', compact('book', 'count', 'activities', 'producers'));
    }

    /**
     * Displays dashboard based on user's role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function loggedin()
    {
        $book = 1;
        $count = 1;

        return view('koshk.loggedin', compact('book', 'count'));
    }
}
