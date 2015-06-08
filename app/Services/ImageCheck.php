<?php namespace App\Services;

	use Validator;
	use App\Contracts\Uploads\ImageCheck as ImageCheckContract;
	use Symfony\Component\HttpFoundation\File\UploadedFile;

	class ImageCheck implements ImageCheckContract
	{
		public function validator(array $data)
		{
			return Validator::make( $data, [
				'image' => 'image|max:'.env('MAX_FILESIZE')
			]);
		}

		public function check(UploadedFile $data)
		{
			
		}
	}