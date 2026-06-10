<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the subscribers.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $subscribers = Subscriber::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('email', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.subscribers.index', compact('subscribers', 'search'));
    }

    /**
     * Show the form for creating a new subscriber.
     */
    public function create()
    {
        return view('admin.subscribers.create');
    }

    /**
     * Store a newly created subscriber in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'ईमेल आवश्यक छ।',
            'email.email' => 'कृपया मान्य ईमेल दिनुहोस्।',
            'email.unique' => 'यो ईमेल पहिले सदस्यता लिएको छ।',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'नयाँ सदस्य सफलतापूर्वक जोडिएको छ।');
    }

    /**
     * Display the specified subscriber.
     */
    public function show(Subscriber $subscriber)
    {
        return view('admin.subscribers.show', compact('subscriber'));
    }

    /**
     * Show the form for editing the specified subscriber.
     */
    public function edit(Subscriber $subscriber)
    {
        return view('admin.subscribers.edit', compact('subscriber'));
    }

    /**
     * Update the specified subscriber in storage.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email,' . $subscriber->id,
        ], [
            'email.required' => 'ईमेल आवश्यक छ।',
            'email.email' => 'कृपया मान्य ईमेल दिनुहोस्।',
            'email.unique' => 'यो ईमेल पहिले सदस्यता लिएको छ।',
        ]);

        $subscriber->update([
            'email' => $request->email,
        ]);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'सदस्य सफलतापूर्वक अपडेट गरिएको छ।');
    }

    /**
     * Remove the specified subscriber from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'सदस्य सफलतापूर्वक हटाइएको छ।');
    }

    /**
     * Export subscribers to CSV.
     */
    public function export()
    {
        $subscribers = Subscriber::all();

        $csv = "Email,Subscription Date\n";
        foreach ($subscribers as $subscriber) {
            $csv .= "\"{$subscriber->email}\",\"{$subscriber->created_at->format('Y-m-d H:i:s')}\"\n";
        }

        return response($csv, 200)
            ->header('Content-Type', 'text/csv; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename="subscribers.csv"');
    }
}
