<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model {

	protected $guarded = ['id', 'user_id'];

	protected $hidden = ['id', 'user_id', 'created_at', 'updated_at'];

	protected $fillable = [
		'short_urls', 
		'retain_filenames', 
		'embed_html_full', 
		'embed_html_thumb', 
		'embed_bbcode_full', 
		'embed_bbcode_thumb'
	];

	protected $casts = [
		'retain_filenames' => 'boolean',
		'embed_html_full' => 'boolean',
		'embed_html_thumb' => 'boolean',
		'embed_bbcode_full' => 'boolean',
		'embed_bbcode_thumb' => 'boolean'
	];

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

}
