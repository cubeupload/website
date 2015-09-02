<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Message;

use Response;

class MessagesController extends Controller 
{

	public function getIndex()
	{
		$messages = Message::whereHidden(false)->orderBy('created_at', 'desc')->paginate(10);
		return view('backend.messageslist')->with('messages', $messages);
	}

	public function getCategory( $category )
	{
		$messages = Message::whereCategory($category)->whereHidden(false)->orderBy('created_at', 'desc')->paginate(10);
		return view('backend.messageslist')->with( ['messages' => $messages, 'category' => $category] );
	}

	public function getHidden()
	{
		$messages = Message::whereHidden(true)->orderBy('created_at', 'desc')->paginate(10);

		if( $messages != null )
		{
			return view('backend.messageslist_hidden')->with('messages', $messages );
		}
	}

	public function postHide( $id )
	{
		$message = Message::find( $id );

		if( $message != null )
		{
			$message->hidden = true;
			$message->read = true;
			$message->save();
			return Response::json(['message' => 'Hidden OK.']);
		}
		else
			return Response::json(['error' => 'Message ID not found.'], 404);
	}

	public function postUnHide( $id )
	{
		$message = Message::find( $id );

		if( $message != null )
		{
			$message->hidden = false;
			$message->save();
			return Response::json(['message' => 'Un-hidden OK,']);
		}
		else
			return Response::json(['error' => 'Message ID not found.'], 404);
	}

	public function postMarkRead( $id )
	{
		$message = Message::find( $id );

		if( $message != null )
		{
			$message->read = true;
			$message->save();
			return Response::json(['message' => 'Message marked as read.']);
		}
		else
			return Response::json(['error' => 'Message ID not found.'], 404);
	}

	public function postSoftDelete( $id )
	{
		$message = Message::find( $id );

		if( $message != null )
		{
			$message->delete();
			return Response::json(['message' => 'Message soft deleted.']);
		}
		else
			return Response::json(['error' => 'Message ID not found.'], 404);
	}
}
