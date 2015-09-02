<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model {

	use SoftDeletes;

	protected $casts = [
		'hidden' => 'boolean',
		'read' => 'boolean'
	];

	protected $dates = [
		'deleted_at'
	];

	public function thread()
	{
		return $this->belongsTo('App\Models\Thread');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function scopeUnread($query)
	{
		return $query->whereRead(false);
	}

	public function displayName()
	{
		if( $this->user_id != 0 )
			return $this->user->name;
		elseif( $this->email != null )
			return $this->email;
		else
			return null;
	}
}
