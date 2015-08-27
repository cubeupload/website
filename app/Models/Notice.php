<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;

class Notice extends Model 
{

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public static function fetchForSession()
	{
		$notices = self::whereVisible(1)->whereShowTo('all');

		if( Session::has('dismissed_notices') )
			$notices->whereNotIn('id', Session::get('dismissed_notices'));

		if( Auth::check() )
		{
			$notices->orWhere('show_to', 'users');

			if( Auth::user()->isAdmin() )
				$notices->orWhere('show_to', 'admins');
		}

		else
			$notices->orWhere('show_to', 'guests');

		$notices->orderBy('metric', 'asc');
		return $notices->get();
	}
}
