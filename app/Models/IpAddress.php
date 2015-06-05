<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model {

	public function user()
	{
		return $this->belongsToMany('App\Models\User');
	}

}
