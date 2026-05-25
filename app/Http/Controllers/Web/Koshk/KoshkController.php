<?php

namespace Vanguard\Http\Controllers\Web\Koshk;



use App\Http\Requests ;
//use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Redirect;

//use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Api\ApiController;

class KoshkController extends ApiController
{
	
	protected $missing_input;

    public function __construct()
    {
        // Allow access to authenticated users only.
        //$this->middleware('auth');

        $this->missing_input = false;

        // Allow access to users with 'users.manage' permission.
        //$this->middleware('permission:users.manage');
    }

    public function getInput($param)
    {/* -- commented 15Jan2021
    	if(Request::has($param))
   			return Request::get($param);
   		else
   		{
   			echo $param;
   			$this->missing_input = true;
   		}*/
    }
}
