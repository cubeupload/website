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
		$users = User::paginate(30);
		
		return view('backend.userlist')->with('users', $users);
	}

	public function postIndex()
	{
		$fields = Input::all();
		//dd( $fields );
		if( array_key_exists( 'id', $fields ) ) // has ID, we're editing.
		{
			$user = User::find( $fields['id'] );

			if( $user !== null )
			{
				$v = Validator::make( $fields, Config::get('validation.admin.user_edit') );

				if( $v->fails() )
					return Response::json($v->messages(), 400 );
				else
				{
					$user->update( $fields );
					return Response::json($user);
				}
			}
			else
				return Response::json(['error' => 'User ID not found'], 404 );
		}
		else
		{
			//No ID in POST, let's try to create.
			$v = Validator::make( $fields, Config::get('validation.user_reg') );

			if( $v->passes() )
			{
				$user = User::create($fields);
				return Response::json($user);
			}
			else
				return Response::json( $v->messages(), 400 );
		}
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

	public function postEdit($id)
	{

	}

}
