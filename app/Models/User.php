<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Hash;
use Config;
use Cache;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'username', 'level', 'registration_ip'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $casts = ['settings'];

	public function ban( $duration = null )
	{
		$ban = new Ban;
		$ban->setDuration( $duration );
		$ban->user()->save( $this );
	}
	
	public function unban()
	{
		$this->bans()->current->lift();
	}

	public function setPasswordAttribute( $value )
	{
		$this->attributes['password'] = Hash::make( $value );
	}

	public function albums()
	{
		return $this->hasMany('App\Models\Album');
	}

	public function images()
	{
		return $this->hasMany('App\Models\Image');
	}

	public function ipAddresses()
	{
		return $this->belongsToMany('App\Models\IpAddress');
	}

	public static function getDefaultSettings()
	{
		return config('users.default_settings');
	}

	public function settings()
	{
		return $this->hasOne('App\Models\UserSetting');
	}

	public function isAdmin()
	{
		if( $this->level >= 9 )
			return true;
		else
			return false;
	}

	public function isModerator()
	{
		if( $this->level >= 5 )
			return true;
		else
			return false;
	}

	public function isSuperUser()
	{
		$user_ids = Config::get('users.super_users');
		if( in_array( $this->id, $user_ids ) )
			return true;
		else
			return false;
	}

	public function scopeRecent($query, $number = 15)
	{
		return $query->orderBy('created_at', 'desc')->take($number);
	}

	public function getUploadStats()
	{
		$cacheId = 'user.' . $this->id . '.stats';
		$stats = [];

		if( Cache::has($cacheId))
		{
			$stats = Cache::get($cacheId);
		}
		else
		{
			$images = $this->images();

			$stats['totalUploads'] = $images->count();
			$stats['uploadsPerWeek'] = 123;
			$stats['diskUsed'] = $images->sum('size');

			Cache::put( $cacheId, $stats, 60 );
		}

		return $stats;
	}

}
