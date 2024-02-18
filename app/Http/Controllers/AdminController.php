<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\EnrollCourse;
use App\Models\QuestionAndAnswer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Donate;

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

        $total_donations = Donate::sum('amount');

        $enroll_courses_count = EnrollCourse::count();
        $pending_questions_count = QuestionAndAnswer::where('answer', NULL)->count();

        $monthly_users_count_dec = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 12)
                                    ->count();

        $monthly_users_count_nov = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 11)
                                    ->count();

        $monthly_users_count_oct = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 10)
                                    ->count();

        $monthly_users_count_sep = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 9)
                                    ->count();

        $monthly_users_count_aug = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 8)
                                    ->count();

        $monthly_users_count_jul = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 7)
                                    ->count();

        $monthly_users_count_jun = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 6)
                                    ->count();

        $monthly_users_count_may = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 5)
                                    ->count();

        $monthly_users_count_apr = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 4)
                                    ->count();

        $monthly_users_count_mar = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 3)
                                    ->count();

        $monthly_users_count_feb = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 2)
                                    ->count();

        $monthly_users_count_jan = User::whereYear('created_at', date("Y"))
                                    ->whereMonth('created_at', 1)
                                    ->count();

        $monthly_users_count = [
                $monthly_users_count_jan, 
                $monthly_users_count_feb,
                $monthly_users_count_mar,
                $monthly_users_count_apr,
                $monthly_users_count_may,
                $monthly_users_count_jun,
                $monthly_users_count_jul, 
                $monthly_users_count_aug,
                $monthly_users_count_sep,
                $monthly_users_count_oct,
                $monthly_users_count_nov,
                $monthly_users_count_dec,
            ];

        return view('admin.dashboard')
                ->with('total_donations', $total_donations)
                ->with('monthly_users_count', $monthly_users_count)
                ->with('pending_questions_count', $pending_questions_count)
                ->with('enroll_courses_count', $enroll_courses_count);

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
