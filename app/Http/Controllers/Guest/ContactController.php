<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\ContactRequest;
use App\Mail\AskFromContact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.contact');
    }

    /**
     * Send email message from guest.
     * 
     * @param  \App\Http\Requests\Guest\ContactRequest  $request
     * @return Illuminate\Http\Response
     */
    public function sendmail(ContactRequest $request)
    {
        Mail::to(env('MAIL_FROM_ADDRESS'))
            ->send(new AskFromContact(
                $request->input('subject'),
                $request->input('email'),
                $request->input('message')
            ));

        return back()->with('status', 'Pesan Anda berhasil terkirim.');
    }
}
