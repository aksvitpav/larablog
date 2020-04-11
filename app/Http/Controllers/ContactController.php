<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(SendContact $request)
    {
        $request->validated();
        Mail::to(env('MAIL_USERNAME', 'larablog.aksvitpav@gmail.com'))->send(new ContactMail($request->all()));
        return true;
    } 
}
