<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Order;

class AdminUserController extends Controller
{
    public function index()
    {  
        $users = User::latest()->paginate(6);
        return view('admin.users.admin_users', compact('users'));
    }

    public function show($id)
    {   
        $user = User::findOrFail($id);
        $orders = Order::where('user_id', $user->id)->get();
        return view('admin.users.show', compact('user', 'orders'));
    }
}
