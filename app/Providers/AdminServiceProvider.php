<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Message;

class AdminServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$messages_unread = Message::unread()->count();
		
		if( $messages_unread > 0 )
			view()->share('messages_unread', $messages_unread);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
