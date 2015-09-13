<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Image;
use App\Models\Notice;

class HomeController extends Controller 
{

	public function getIndex()
	{
		$notices = Notice::fetchForBackend();
		$recent_users = User::recent(10)->get();
		$recent_images = Image::recent(50)->get();

		return view('backend.home')->with([
			'users' => $recent_users,
			'images' => $recent_images,
			'notices' => $notices
		]);
	}

}
