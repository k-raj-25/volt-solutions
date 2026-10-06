<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        // Honeypot: real users leave this empty.
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you! We will get back to you shortly.');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'interest' => ['nullable', 'in:Loans,Real Estate,Other'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        Message::create($data);

        return back()->with('success', 'Thank you! We will get back to you shortly.');
    }
}
