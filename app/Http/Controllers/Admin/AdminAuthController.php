<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Mail\Websitemail;

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
     * Forget Password Submit
     */
    public function forget_password_submit(Request $request){
         # VALIDATION
         $request->validate([
            'email' => ['required', 'email'],
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            return redirect()->back()->with('error', 'Email is not found');
        }

        $token = Hash('sha256', time());
        $admin->token = $token;
        $admin->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = "Password Reset";
        $message = "To reset password, please click on the link below:</br>";
        $message .= "<a href='".$reset_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'We have sent a password reset link to your email. Please check your email. If you do not find the email in your inbox, please check your spam folder.');

    }

    /**
     * Reset Password
     */
    public function reset_password($token, $email){
        $admin =  Admin::where('email', $email)->where('token', $token)->first();
        if(!$admin){
            return redirect()->route('admin_login')->with('error', 'Token or email is not correct');
        }
        return view('admin.reset-password', compact('token', 'email'));
    }

    /**
     * Reset Password Submit
     */
    public function reset_password_submit(Request $request, $token, $email){
         # VALIDATION
         $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);

        $admin = Admin::where('email', $request->email)->where('token', $request->token)->first();
        $admin->password = Hash::make($request->password);
        $admin->token =  "";
        $admin->update();

        return redirect()->route('admin_login')->with('success', 'Password reset is successful. You can login now.');
    }
}
