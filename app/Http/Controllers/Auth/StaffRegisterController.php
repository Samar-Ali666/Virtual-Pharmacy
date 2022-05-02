<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class StaffRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:staff');
    }

    public function showRegistrationForm()
    {
        return view('staff.auth.staff-register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:staffs'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        try {
            $staff = Staff::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            Auth::guard('staff')->loginUsingId($staff->id);
            return redirect()->route('staff.dashboard');    
        } catch (\Exception $e) {           
           return redirect()->back()->withInput($request->only('firstname', 'email'));
        }
    }
}
