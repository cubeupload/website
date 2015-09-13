<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

use Cache;
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
        $input = Input::all();

        if( array_key_exists( 'username', $input ) && !empty( $input['username'] ))
			$users = $users->where( 'username', 'like', '%' . $input['username'] . '%' );

        if( array_key_exists( 'email', $input ) && !empty( $input['email'] ))
			$users = $users->where( 'email', 'like', '%' . $input['email'] . '%' );

		if( array_key_exists( 'ip_address', $input ) && !empty( $input['ip_address'] ))
			$users = $users->where( 'registration_ip', 'like', '%' . $input['ip_address'] . '%' );

		return view('backend.userlist')->with(['users' => $users->paginate(30), 'search' => $input ]);
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

	public function getStats($id)
	{
		$user = User::find($id);

		if( $user )
		{
			$stats = $user->getUploadStats();
			

			return view('backend.userstats')->with( ['stats' => $stats, 'user' => $user ]);
		}
	}

}
