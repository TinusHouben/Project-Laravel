<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Methode om het contactformulier te tonen
    public function show()
    {
        return view('contactform');
    }

    // Methode om het contactformulier te verwerken en e-mail te sturen
    public function send(Request $request)
    {
        // Valideer de formulierdata
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Stuur email naar admin (pas admin@voorbeeld.nl aan naar jouw admin email)
        Mail::raw("Bericht van: {$validated['name']} ({$validated['email']})\n\n{$validated['message']}", function ($message) {
            $message->to('admin@voorbeeld.nl')
                    ->subject('Nieuw contactformulier bericht');
        });

        // Redirect terug met succesmelding
        return back()->with('success', 'Bedankt voor je bericht! We nemen snel contact met je op.');
    }
}
