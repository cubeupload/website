<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use Illuminate\Http\Request;

class SettingsController extends Controller 
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		return view('settings')->with(['settings' => Auth::user()->settings]);
	}

	public function postIndex(Request $request)
	{
		Auth::user()->settings->fill( $request->all() )->save();

		return redirect('/settings')->with('success', true);
	}
}
