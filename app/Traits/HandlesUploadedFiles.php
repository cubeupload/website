<?php namespace App\Traits;

	use Illuminate\Http\Request;
	use Auth;
	use File;
	use CloudStorage;
	use App\Models\Image;
	use App\Services\ImageCheck;


	trait HandlesUploadedFiles
	{
		public function postIndex(Request $request)
		{
			if( $request->hasFile('imageUpload') && $request->file('imageUpload')->isValid() )
			{
				$file = $request->file('imageUpload');
				
				//$file->move( storage_path() . '/' . env('STAGING_FOLDER') );

				//$checker = new ImageCheck;

				$img = Image::fromUpload( $file );

				if( !Auth::check() )
					$img->generateName();
				else
				{
					Auth::user()->images()->save($img);
				}

				$img->save();

				if( !Auth::check() )
					CloudStorage::put($img->getHashPath(), File::get($file->getPathname()), 'public');
				else
					CloudStorage::put(Auth::user()->username . '/' . $img->name, File::get($file->getPathname()), 'public');

				$json = [
					'initialPreview' => ['<img class="file-preview-image" src="'.$img->getPublicUrl().'"></img>'],
					'initialPreviewConfig' => [
						(object)[
							'caption'=> '<a href="'.$img->getPublicUrl().'" target="_blank">'.$img->name.'</a>', 
							'width' => '120px', 
							'url' => url('ajax/image/delete/'.$img->deleteKey), 
							'key' => $img->deleteKey,
							'extra' => ['_token' => csrf_token() ]
						]
					]
				];

				return json_encode( $json );
			}
			else
				return json_encode( ['error'=> 'Something went wrong'] );
		}
	}