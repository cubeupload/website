<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Image;

class ImagesController extends Controller {

	public function getUser( $id )
	{

	}

	public function getIndex()
	{
		$images = Image::paginate(30);

		return view('backend.images.list')->with( 'images', $images );
	}

	public function getShow( $id )
	{
		$image = Image::find( $id );

		if( $image )
			return view('backend.images.show')->with( 'image', $image );
		else
			return view('backend.images.show');
	}
	
	public function getDuplicates( $id )
	{
		$image = Image::find($id);
		
		if( $image )
		{
			$dupes = Image::whereHash( $image->hash )->get();
			return view('backend.images.list')->with('images', $dupes );
		}
	}
}
