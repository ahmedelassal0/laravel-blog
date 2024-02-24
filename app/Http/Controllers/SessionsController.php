<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        session()->flash('success', 'goodbye');
        return redirect('/');
    }

    public function create()
    {
        return view('sessions.create');
    }

    /**
     * @throws ValidationException
     */
    public function store()
    {
        $user = request()->validate([
            'email' => ['email', 'max:255'],
            'password' => ['min:8', 'max:255']
        ]);

        if (! auth()->attempt($user)) {
            throw ValidationException::withMessages(
                ['error' => 'wrong email or password']
            );
        }

        session()->regenerate();
        return redirect('/')->with('success', 'welcome back!');
    }
}
