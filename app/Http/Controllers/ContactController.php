<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('contact', compact('setting'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        Mail::to(config('mail.admin_address'))
            ->send(new ContactMessageMail($contactMessage));

        return back()->with(
            'chat_success',
            'Pesan Anda berhasil dikirim. Tim BRAMAX akan segera menghubungi Anda.'
        );
    }
}
