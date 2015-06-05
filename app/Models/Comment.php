<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $fillable = ['text'];
	
	public function album()
	{
		return $this->belongsTo('App\Models\Album');
	}
	
	public function image()
	{
		return $this->belongsTo('App\Models\Image');
	}

}
