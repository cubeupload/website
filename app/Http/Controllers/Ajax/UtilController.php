<?php namespace App\Http\Controllers\Ajax;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use Session;

class UtilController extends Controller 
{
	public function getKillSession()
	{
		Session::flush();
		return redirect('/');
	}

	public function postCloseNotice()
	{
		$id = Input::get('id');
		
		if( Session::has('dismissed_notices') )
		{
			if( !in_array( $id, Session::get('dismissed_notices') ) )
				Session::push('dismissed_notices', $id);			
		}
		else
			Session::push('dismissed_notices', $id);				

		return;
	}

}
