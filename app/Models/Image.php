<?php namespace App\Models;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use File;

class Image extends Model {

	protected $fillable = ['originalName', 'mimeType', 'size'];

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
			'mimeType' => $file->getClientMimeType()
		]);

		$img->name = $img->originalName;

		return $img;
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
			return env('IMAGE_USER_URL').'/'.$this->user()->username.'/'.$this->name;
	}
}
