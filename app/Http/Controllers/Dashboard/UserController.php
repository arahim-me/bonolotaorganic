<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Users';
        $users = User::all();
        $statuses = Status::all();
        $roles = Role::all();
        return view('dashboard.users.index', compact('roles','statuses','title','users'));
    }

    public function filter(Request $request)
    {
        $statuses = Status::all();
        $users = User::query()
            ->with(['role', 'status'])

            // Search Filter
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%");
                });
            })

            // Role Filter
            ->when($request->filled('role_id'), function ($query) use ($request) {
                $query->where('role_id', $request->role_id);
            })

            // Status Filter
            ->when($request->filled('status_id'), function ($query) use ($request) {
                $query->where('status_id', $request->status_id);
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        $roles = Role::all();
        $statuses = Status::all();

        return view('dashboard.users.index', compact(
            'users',
            'roles',
            'statuses'
        ));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($validated);

        // handle optional avatar upload
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            if ($user->avatar) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function updateAvatar(Request $request, User $user)
    {
        $data = $request->validate([
            'avatar' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            if ($user->avatar) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->route('users.edit', $user)->with('success', 'Avatar updated');
    }

    public function updatePassword(Request $request, User $user)
    {
        $data = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = bcrypt($data['password']);
        $user->save();

        return redirect()->route('users.edit', $user)->with('success', 'Password updated');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
