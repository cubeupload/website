<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

use Config;
use Input;
use Response;
use Validator;

class UsersController extends Controller 
{

	// listing of users
	public function getIndex(Request $request)
	{
		$users = new User;

		if( Input::has('username') && !empty( Input::get('username')))
			$users = $users->where( 'username', 'like', '%' . Input::get('username') . '%' );		

		if( Input::has('email') && !empty( Input::get('email')))
			$users = $users->where( 'email', 'like', '%' . Input::get('email') . '%' );		

		return view('backend.userlist')->with(['users' => $users->paginate(30), 'search' => Input::all() ]);
	}

	public function postIndex()
	{

	}

	public function getShow( $id )
	{
		$user = User::find($id);

		if( !$user )
			return view('backend.usershow')->with('error', 'User not found');
		else
		{
			$images = $user->images()->take(30)->get();
			return view('backend.usershow')->with(['user' => $user, 'images' => $images]);
		}
	}

	public function getEdit($id)
	{
		$user = User::find($id);

		if( !$user )
			return view('backend.useredit')->with('error', 'User not found');
		else
			return view('backend.useredit')->with('user', $user);
	}

	public function postEditDetails($id)
	{
		$user = User::find($id);

		if( !$user )
			return response(['error' => 'User not found'], 404);
		else
		{
			$input = Input::all();
			$rules = config('validation.admin.user_edit');
			$rules['email'] .= ',' . $user->id;

			$validator = Validator::make( $input, $rules );

			if( $validator->passes() )
			{
				if( $user->update( $input ) )
					return response( ['message' => 'User updated' ]);
				else
					return response( ['error' => 'User was not updated'], 500);
				
			}
			else
				return response( $validator->messages(), 400 );

		}
	}

	public function postEditSettings($id)
	{
		return Input::all();
	}

}
