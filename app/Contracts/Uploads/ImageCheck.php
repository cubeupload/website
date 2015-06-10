<?php namespace App\Contracts\Uploads

	use Symfony\Component\HttpFoundation\File\UploadedFile;

	interface ImageCheck
	{
		public function validator( array $data );

		public function check( UploadedFile $file );
	}