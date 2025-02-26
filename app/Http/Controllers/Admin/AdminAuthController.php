<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    /**
     * Login
     */
    public function login(){
        return view('admin.login');
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
