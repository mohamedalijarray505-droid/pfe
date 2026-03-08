<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactMessageNotification;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // Enregistrer le message
        $msg = Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['message'],
        ]);

        // Notifier l'admin (notification Laravel)
        Notification::route('mail', config('mail.admin_email', 'admin@example.com'))
            ->notify(new ContactMessageNotification($msg));

        // Notifier l'admin connecté (notification base + mail)
        $admin = \App\Models\User::where('role', 'admin')->first();
        if ($admin) {
            $admin->notify(new ContactMessageNotification($msg));
        }

        return back()->with('success', 'Votre message a bien été envoyé !');
    }
}
