<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

	public function images()
	{
		return $this->hasMany('App\Models\Image');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

}
