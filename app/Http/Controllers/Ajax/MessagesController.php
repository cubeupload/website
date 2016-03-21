<?php namespace App\Http\Controllers\Ajax;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Message;

class MessagesController extends Controller 
{
	public function postIndex()
	{
		$msg = Message::create(Input::all());
		dd($msg);
	}

}
