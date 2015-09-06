<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Image;

class HomeController extends Controller 
{

	public function getIndex()
	{
		$recent_users = User::recent(15)->get();
		$recent_images = Image::recent(50)->get();
		return view('backend.home')->with(['users' => $recent_users, 'images' => $recent_images ]);
	}

}
