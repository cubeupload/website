<?php namespace App\Models;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use File;
use Request;

class Image extends Model {

	use SoftDeletes;

	protected $fillable = ['originalName', 'mimeType', 'size', 'name', 'description', 'hash', 'uploader_ip'];

	public function album()
	{
		return $this->belongsTo('App\Models\Album');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	/*
		Here we create a unique 6 character filename which is used for
		guest images and also user images if they define a random name.
	*/
	public function generateName()
	{
		$created = false;
		$limit = 4;
		$tries = 0;

		while( !$created )
		{

			//if( $tries == 2 )
				// send mail to staff notifying of two attempts.

			//if( $tries == 4 )
				// give up

			$name = str_random(6);
			
			if( Image::where('name', 'LIKE', $name)->count() == 0 )
			{
				$extn = File::extension( $this->name );
				$this->name = $name . '.' . $extn;
				$created = true;
			}
			else
			{
				$tries++;
			}
		}
	}

	public static function fromUpload( UploadedFile $file )
	{
		$img = new static;

		$img->fill([
			'originalName' => $file->getClientOriginalName(),
			'size' => $file->getClientSize(),
			'mimeType' => $file->getClientMimeType(),
			'hash' => hash_file( 'md5', $file->getPathname() ),
			'uploader_ip' => Request::ip()
		]);

		$img->name = $img->originalName;
		$img->generateDeleteKey();

		return $img;
	}

	public function getHashPath()
	{
		if( !empty( $this->hash ) )
		{
			$h = $this->hash;
			return $h[0] . '/' . $h[1] . '/' . $h[2] . '/' . $h . '.dat';
		}
	}

	public function isGuestImage()
	{
		if( !$this->user_id )
			return true;
		else
			return false;
	}

	public function getPublicUrl()
	{
		if( $this->isGuestImage() )
			return env('IMAGE_GUEST_URL').'/'.$this->name;
		else
			return env('IMAGE_USER_URL').'/'.$this->user->username.'/'.$this->name;
	}

	public function generateDeleteKey()
	{
		return $this->deleteKey = str_random(8);
	}

	public function scopeRecent($query, $number = 15)
	{
		return $query->orderBy('created_at', 'desc')->take($number);
	}
}
