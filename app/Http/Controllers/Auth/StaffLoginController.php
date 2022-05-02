<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Staff;

use Auth;

use Route;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class StaffLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }

    public function showLoginForm()
    {
        return view('staff.auth.staff-login');
    }

    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            if (Auth::guard('staff')->user()->is_approved == 1) {
                return redirect()->intended(route('staff.dashboard'));
            } else {
                Auth::guard('staff')->logout();
                return view('side_views.staff_restricted');
            }
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
        return redirect()->back()->with($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('staff')->logout();
        return redirect('/');
    }
}
