<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function store(ContactRequest $request){
        // $request->validate([
        //     'name' => 'required|string|max:16|alpha',
        //     'email' => 'required|string|email',
        //     'message' => 'required|string|max:500',
        // ]);
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        Mail::to(env('MAIL_TO'))
        ->send(new ContactMail($contact));

        return redirect()->route('contact')
        ->with(['message' => 'お問い合わせが完了しました。', 'status'=> 'info']);
    }
}
