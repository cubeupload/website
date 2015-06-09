<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Hash;

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
	protected $fillable = ['name', 'email', 'password', 'username'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function ban( $duration = null )
	{
		$ban = new Ban;
		$ban->setDuration( $duration );
		$ban->user()->save( $this );
	}
	
	public function unban()
	{
		$this->bans()->current()->lift();
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

	public function threads()
	{
		return $this->hasMany('App\Models\Thread');
	}

	public function notices()
	{
		return $this->hasMany('App\Models\Notice');
	}

	public function ipAddresses()
	{
		return $this->belongsToMany('App\Models\IpAddress');
	}

	public function settings()
	{
		return $this->hasOne('App\Models\UserSetting');
	}

}
