<?php

namespace Vanguard\Http\Controllers\Koshk;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;

class ProducerController extends Controller
{
    //

    public function index(Request $request)
    {
    	echo 'index main             ';

    	dd($request);

		

		echo 'created object';

		

    }

    public function producer(Request $request, $prod_name)
    {
    	echo 'producer             '.$prod_name;

    	dd($request);

		

		echo 'created object';

		

    }


    public function activity(Request $request, $prod_name, $activity_name)
    {
    	echo 'activity             '. $prod_name. '   '. $activity_name;

    	dd($request);

		

		echo 'created object';

		

    }

    public function challenge(Request $request, $prod_name, $activity_name, $challenge_name)
    {
    	echo 'challenge             '.$prod_name. '   '. $activity_name. '   '. $challenge_name;

    	dd($request);

		

		echo 'created object';

		

    }
}
