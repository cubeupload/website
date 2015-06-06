<?php namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;

use App\Traits\HandlesUploadedFiles;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UploadController extends Controller 
{

	use HandlesUploadedFiles;

	public function __construct()
	{

	}

	public function getIndex()
	{
		return view( 'upload' );
	}

}
