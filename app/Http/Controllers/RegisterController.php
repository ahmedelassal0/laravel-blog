<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register.create');
    }

    public function store()
    {
        $user = User::create(request()->validate([
            'name' => ['required', 'max:255', 'min:2'],
            'username' => ['required', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:7']
        ]));

        auth()->login($user);
        return redirect('/')
            ->with('success', 'your account has been created.');
    }
}
