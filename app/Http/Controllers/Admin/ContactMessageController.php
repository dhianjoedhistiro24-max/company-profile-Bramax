<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    /**
     * Menampilkan semua pesan dari pengunjung
     */
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.contact-messages.index', compact('messages'));
    }

    /**
     * Menampilkan detail satu pesan
     */
    public function show(ContactMessage $contactMessage)
    {
        // Jika pesan masih baru maka ubah menjadi sudah dibaca
        if ($contactMessage->status === 'new') {
            $contactMessage->update([
                'status' => 'read',
            ]);
        }

        return view(
            'admin.contact-messages.show',
            compact('contactMessage')
        );
    }

    /**
     * Mengubah status pesan
     */
    public function updateStatus(ContactMessage $contactMessage)
    {
        request()->validate([
            'status' => ['required', 'in:new,read,replied'],
        ]);

        $contactMessage->update([
            'status' => request('status'),
        ]);

        return back()->with(
            'success',
            'Status pesan berhasil diperbarui.'
        );
    }

    /**
     * Menghapus pesan
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}