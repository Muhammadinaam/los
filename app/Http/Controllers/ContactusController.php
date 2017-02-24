<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactusController extends Controller
{
    //

    public function index()
    {
    	return view('contactus');
    }

    public function mailMessage(Request $request)
    {
    	$this->validate($request, [
	        'name' => 'required',
	        'email' => 'required|email',
	        'message' => 'required',
	    ]);

    	Mail::raw($request->input('message'), function ($message)use($request){
		      $message->to('minaammunir@gmail.com')->from( $request->input('email'), $request->input('name') );
		 });

    }
}
