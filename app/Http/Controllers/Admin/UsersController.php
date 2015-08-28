<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller 
{

	// listing of users
	public function getIndex()
	{
		$users = User::paginate(10);
		return view('backend.userlist')->with('users', $users );
	}

}
