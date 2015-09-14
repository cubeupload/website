<?php namespace App\Http\Middleware;

use Closure;

class SourceControlVersion {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$source = '../.githash';

		if( file_exists( $source ) )
		{
			view()->share('vcs_version', file_get_contents( $source ));
		}

		return $next($request);
	}

}
