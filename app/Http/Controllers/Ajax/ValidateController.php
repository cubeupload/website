<?php namespace App\Http\Controllers\Ajax;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Registrar;

use Validator;

use Illuminate\Http\Request;


class ValidateController extends Controller 
{
	public function getRegister(Request $request)
	{
		if( $request->ajax() )
		{
			$input = $request->all();

			$key = key($input);
			$value = $input[$key];

			$validator = Validator::make(
				[$key => $value],
				[$key => config('validation.user_reg.'.$key)]
			);

			if( $validator->passes() )
				return response('', 200 );
			else
				return response( ['message' => $validator->messages()->first($key)], 400 );
		}
	}
}
