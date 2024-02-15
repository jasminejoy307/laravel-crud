<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        return view('email.contact');
    }
    public function contact(Request $request)
    {
        $mailData = array();
        try {
            $mailData['name']  = $request->name;
            $mailData['email'] = $request->email;
            $mailData['phone'] = $request->phone;
            // dispatch(Mail::to('your_email@gmail.com')->send(new ContactMail($mailData))); - for queue
            Mail::to('your_email@gmail.com')->send(new ContactMail($mailData));
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
