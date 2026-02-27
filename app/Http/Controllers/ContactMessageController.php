<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', __('home.contact_success'));
    }

    public function adminIndex()
    {
        $messages = ContactMessage::select('id', 'first_name', 'last_name', 'email', 'message', 'created_at')
            ->latest()
            ->paginate(15);

        return view('admin.messages', compact('messages'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted.');
    }
}
