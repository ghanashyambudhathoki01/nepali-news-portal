<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'कृपया ईमेल दिनुहोस्।',
            'email.email' => 'कृपया मान्य ईमेल दिनुहोस्।',
            'email.unique' => 'यो ईमेल पहिले सदस्यता लिएको छ।',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return Redirect::back()->with('success', 'सफलतापूर्वक न्यूजलेटरको सदस्य बनेको छन्। धन्यवाद!');
    }
}
