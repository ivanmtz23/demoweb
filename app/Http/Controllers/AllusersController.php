<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AllusersController extends Controller
{
   public function getData()
	{
		if (!Auth::check() || Auth::user()->id == 1)
		{
			 $data['data'] = DB::table('users')->get();
		    if(count($data) > 0)
		    {
		    	return view('show', $data);
		    }
		    else
		    {
		    	return view('show');
		    }
		}
	    else
	    {
	    	return redirect('/');

		}
	   
	}
}
