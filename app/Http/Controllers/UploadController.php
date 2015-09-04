<?php namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use App\Models\Notice;

use App\Traits\HandlesUploadedFiles;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;

use Illuminate\Http\Request;

class UploadController extends Controller 
{

	use HandlesUploadedFiles;

	public function __construct()
	{

	}

	public function getIndex()
	{
		return view( 'frontend.upload' );
	}

}
