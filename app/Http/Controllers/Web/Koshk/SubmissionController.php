<?php

namespace Vanguard\Http\Controllers\Web\Koshk;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;


class SubmissionController extends Controller
{
    // select vgsubmission.submission_id, vgusers.first_name, vgusers.last_name, vgsubmission.submission_date, vgsubmission.details from vgusers, vgsubmission where vgusers.id = vgsubmission.user_id


    public function index(Request $request)
    {
    	//echo 'START              ';

    	//dd($request);

		

		//echo 'created object';

    	$sql = "select vgsubmission.submission_id, vgusers.first_name, vgusers.last_name, vgsubmission.submission_date, vgsubmission.details from vgusers, vgsubmission where vgusers.id = vgsubmission.user_id";

    	$users = DB::table('users')
            ->join('submission', 'users.id', '=', 'submission.user_id')
            ->select('submission.submission_id','users.first_name', 'users.last_name', 'submission.submission_date', 'submission.details')
            ->get();

         dd($users);
    }
}
