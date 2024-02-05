<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    //
    public function index() {

        $admins = Admin::all();

        return view('admin.admins.index', [ 'admins' => $admins ]);
        
    }

    public function create() {

        return view('admin.admins.create');

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
                ->route('admin.admins.index')
                ->withSuccess('Admin created successfully.');

    }

    public function edit($id) {

        $admin = Admin::findOrFail($id);

        return view('admin.admins.edit', ['admin' => $admin]);

    }

    public function update(Request $request, $id) {

        $admin = Admin::find($id);

        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', Rule::unique('admins')->ignore($id) ],
        ]);

        if($request->filled('password')) {

            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $admin->password = Hash::make($request->password);

        }

        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;

        $admin->save();

        return redirect()->route('admin.admins.index')
                        ->withSuccess('Admin updated successfully.');

    }

    public function dashboard() {

        return view('admin.dashboard');

    }

    public function login(Request $request) {

       $login = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password] );

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');

    }

    public function destroy($id) {

        Admin::find($id)->delete();

        return redirect()->route('admin.admins.index')
                            ->withSuccess('Admin deleted successfully.');

    }

}
