<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    /**
     * Login
     */
    public function login(){
        return view('admin.login');
    }

    /**
     * Login Submit
     */
    public function login_submit(Request $request){
        
        # VALIDATION
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];

        if(Auth::guard('admin')->attempt($data)){
            return redirect()->route('admin_dashboard')->with('success','Login is successful!');
        }else{
            return redirect()->route('admin_login')->with('error', 'The information you entered is incorrect! Please try again!');
        }

    }

    /**
     * Logout
     */
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success', 'Logout is successful!');
    }

    /**
     * Profile
     */
    public function profile(){
        return view('admin.profile');
    }

    /**
     * Forget Password
     */
    public function forget_password(){
        return view('admin.forget-password');
    }

    /**
     * Reset Password
     */
    public function reset_password(){
        return view('admin.reset-password');
    }
}
