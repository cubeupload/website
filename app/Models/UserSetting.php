<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model {

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

}
