<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::select('id', 'name', 'email', 'is_admin', 'can_view_clients', 'can_view_messages', 'created_at');
        
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(15)->withQueryString();
        
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'boolean',
            'can_view_clients' => 'boolean',
            'can_view_messages' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_admin'] = $request->boolean('is_admin');
        $validated['can_view_clients'] = $request->boolean('can_view_clients');
        $validated['can_view_messages'] = $request->boolean('can_view_messages');

        User::create($validated);

        return redirect()->route('admin.users')->with('success', 'User created.');
    }

    public function destroy(User $user)
    {
        if ($user->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Cannot delete super admin.');
        }
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Cannot delete yourself.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User deleted.');
    }

    public function toggleAdmin(User $user)
    {
        if ($user->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Cannot modify super admin.');
        }

        $user->update(['is_admin' => !$user->is_admin]);
        return redirect()->back()->with('success', 'Admin status updated.');
    }

    public function updatePermissions(Request $request, User $user)
    {
        if ($user->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Cannot modify super admin.');
        }

        $user->update([
            'can_view_clients' => $request->boolean('can_view_clients'),
            'can_view_messages' => $request->boolean('can_view_messages'),
        ]);

        return redirect()->back()->with('success', 'Permissions updated.');
    }
}
