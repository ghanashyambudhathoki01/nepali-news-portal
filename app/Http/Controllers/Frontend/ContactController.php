<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    /**
     * Display the contact form.
     */
    public function show()
    {
        return view('frontend.contact');
    }

    /**
     * Store a new message in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        session()->flash('success', 'तपाईंको सन्देश सफलतापूर्वक पठाइयो। हामी चाँडै सम्पर्क गर्नेछौं।');
return redirect()->back();
    }
}
