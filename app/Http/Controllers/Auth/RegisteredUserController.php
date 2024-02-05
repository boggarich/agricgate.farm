<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class RegisteredUserController extends Controller
{

    public function update(Request $request): RedirectResponse
    {

        $user = User::find(Auth::id());

        if($request->hasFile('file')) {

            $path = Storage::putFile('images', $request->file);

            $url = Storage::url($path);

            $user->profile_img_url = $url;

        }

        if ($request->filled('username')) {

            $user->username = $request->input('username');
            
        }

        if ($request->filled(['password', 'confirm_password'])) {

            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user->password = Hash::make($request->password);
            
        }

        $user->save();

        return back()->with('status', 'Account updated.');

    }


    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'profile_img_url' => '/assets/img/default-profile.png',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return back();
    }
}
