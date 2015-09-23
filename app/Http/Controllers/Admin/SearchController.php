<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;

use App\Models\User;
use App\Models\Image;
use App\Models\Album;

class SearchController extends Controller 
{
	public function getIndex()
	{
		return view('backend.search');
	}

	public function postIndex()
	{
		$query = Input::get('query');

		if( $query == '' )
			return [];

		$users = User::like($query)->get();
		$images = Image::like($query)->get();
		$albums = Album::like($query)->get();

		$usersView = view('backend.partials.userssearchresult')->with('users', $users)->render();
		
		return ['users' => $usersView, 'images' => $images, 'albums' => $albums];
	}
}
