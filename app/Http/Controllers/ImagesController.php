<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use Illuminate\Http\Request;

class ImagesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		return view('frontend.images')->with(['images' => Auth::user()->images()->get()]);
	}

}
