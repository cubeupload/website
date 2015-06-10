<?php namespace App\Http\Controllers\Ajax;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Image;

use Illuminate\Http\Request;

class ImageController extends Controller 
{

	public function getCodes($id)
	{

		$img = Image::find($id);

		if( $img != null )
		{
			return response(
				[
					'bbcode' => '[url='.url('/').'][img]'.$img->getPublicUrl().'[/img][/url]',
					'html' => '<a href="'.url('/').'"><img src="'.$img->getPublicUrl().'"></img></a>',
				]
			, 200);
		}
		else
		{
			return response(
				[
					'error' => 'Image not found'
				], 404);
		}
	}

	public function anyDelete($deleteKey)
	{
		dd( $deleteKey );
	}

}
