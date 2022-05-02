<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Admin;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.admin-login');
    }

    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            
            return redirect()->intended(route('admin.dashboard'));
        }

        $this->incrementLoginAttempts($request);
        
        return $this->sendFailedLoginResponse($request);

        return redirect()->back()->with($request->only('email', 'remember'));


    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
