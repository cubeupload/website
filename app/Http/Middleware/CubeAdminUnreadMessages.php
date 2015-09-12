<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class CubeAdminUnreadMessages
{
	public function handle( $request, Closure $next )
	{

		$messages_unread = Message::unread()->count();
		
		if( $messages_unread > 0 )
			view()->share('messages_unread', $messages_unread);

		return $next($request);
	}
}