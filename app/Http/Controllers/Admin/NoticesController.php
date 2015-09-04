<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Notice;

class NoticesController extends Controller 
{

	public function getIndex()
	{
		$notices = Notice::all();

		return view('backend.noticeslist')->with('notices', $notices);
	}

}
