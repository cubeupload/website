<?php namespace App\Traits;

	use Illuminate\Http\Request;
	use Auth;
	use File;
	use CloudStorage;
	use App\Models\Image;


	trait HandlesUploadedFiles
	{
		public function postIndex(Request $request)
		{
			if( $request->hasFile('imageUpload') && $request->file('imageUpload')->isValid() )
			{
				$file = $request->file('imageUpload');
				
				//$file->move( storage_path() . '/' . env('STAGING_FOLDER') );

				$img = Image::fromUpload( $file );

				if( !Auth::check() )
					$img->generateName();

				$img->save();

				CloudStorage::put($img->name, File::get($file->getPathname()), 'public');

				$json = [
					//'error' => 'oh fux',
					'initialPreview' => ['<img class="file-preview-image" src="'.$img->getPublicUrl().'"></img>'],
					'initialPreviewConfig' => [
						(object)['caption'=> $img->name, 'width' => '120px', 'url' => 'http://delete-url', 'key' => 'deleteKey']
					]
				];

				return json_encode( $json );
			}
			else
				return json_encode( ['error'=> 'Something went wrong'] );
		}
	}