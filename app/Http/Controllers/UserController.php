<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        Gate::authorize('is_admin');

        $users = User::withCount('courses')->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        Gate::authorize('is_admin');

        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create([
            'email' => $request->validated('email'),
            'is_admin' => $request->boolean('is_admin'),
            'name' => $request->validated('name'),
            'password' => Hash::make($request->validated('password')),
        ]);

        return redirect()->route('admin.users.index')->with('status', 'user-created');
    }

    public function show(User $user): View
    {
        Gate::authorize('is_admin');

        $user->loadCount('courses');

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        Gate::authorize('is_admin');

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = [
            'email' => $request->validated('email'),
            'is_admin' => $request->boolean('is_admin'),
            'name' => $request->validated('name'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->validated('password'));
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('status', 'user-updated');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        Gate::authorize('is_admin');

        if ($request->user()->is($user)) {
            return back()->with('status', 'current-user-cannot-be-deleted');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'user-deleted');
    }
}
