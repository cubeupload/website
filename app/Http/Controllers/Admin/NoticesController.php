<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Notice;
use Input;

class NoticesController extends Controller 
{

	public function getIndex()
	{
		$notices = Notice::all();

		return view('backend.noticelist')->with('notices', $notices);
	}

	public function getAdd()
	{
		return view('backend.noticeadd');
	}

	public function postAdd()
	{
		$input = Input::all();
		unset($input['_token']);

		$notice = Notice::create( $input );
		$notice->save();

		return redirect('/admin/notices/edit/'. $notice->id);
	}

	public function getEdit($id)
	{
		$notice = Notice::find($id);

		if( $notice )
			return view('backend.noticeedit')->with('notice', $notice);
		else
			return view('backend.noticeedit');

	}

	public function postEdit( $id )
	{
		$notice = Notice::find($id);
		$input = Input::all();

		if( $notice )
		{
			$notice->update($input);
			$notice->save();
			return $notice;
		}
	}

	public function postDelete($id)
	{
		$notice = Notice::find( $id );
		if( $notice )
		{
			$notice->delete();
			return redirect('/admin/notices');
		}
	}

}
