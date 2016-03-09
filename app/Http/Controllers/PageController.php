<?php namespace App\Http\Controllers;

use App\Models\User;

class PageController extends Controller 
{
	
	public function getAbout()
	{
		return view('frontend.pages.about');
	}
	
	public function getTerms()
	{
		return view('frontend.pages.terms');
	}
	
	public function getFaq()
	{
		return view('frontend.pages.faq');
	}
	
	public function getContact()
	{
		return view('frontend.pages.contact');
	}
	
	public function getHelp()
	{
		return view('frontend.pages.help');
	}

}
