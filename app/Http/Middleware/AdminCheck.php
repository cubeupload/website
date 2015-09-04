<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminCheck
{
	public function handle( $request, Closure $next )
	{
		if( Auth::check() && Auth::user()->isAdmin() )
			return $next($request);
		else
		{
			if( $request->ajax() )
				return response('Unauthorised', 401);
			else
				return view('frontend.restricted');
		}
	}
}