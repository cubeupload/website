<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model {

	public protected $fillable = ['decimal', 'country'];

	public function user()
	{
		return $this->belongsToMany('App\Models\User');
	}

}
