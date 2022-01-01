<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact-us');
    }
    public function sendEmail(Request $request){
        $details=[
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        
        ];
        Mail::to('maryoma.s.a@gmail.com')->send(new ContactMail($details));
        return back()->with('message','Your message has been sent.');

        //return back()->with('message_sent','Your message has been sent.');
    }
}
