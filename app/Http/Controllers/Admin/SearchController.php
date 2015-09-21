<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;

class SearchController extends Controller 
{
	public function getIndex()
	{
		return view('backend.search');
	}

	public function postIndex()
	{
		$input = Input::all();
		return ["view" => 'Test data = ' . $input['query']];
	}
}
