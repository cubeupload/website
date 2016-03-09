<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;


class ToolsController extends Controller 
{

	public function getIndex()
	{
		return view('backend.tools');
	}

	public function getPhpinfo()
	{
		if( Input::get('show') )
		{
			return phpinfo();
		}
		else
		{
			return view('backend.tools.phpinfo');
		}
	}

}
