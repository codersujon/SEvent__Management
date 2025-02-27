<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;

class FrontController extends Controller
{
    /**
     * Home
     */
    public function home(){
        return view('front.home');
    }

    /**
     * Registration
     */
    public function registration(){
        return view('front.registration');
    }

    /**
     * Registration Submit
     */
    public function registration_submit(Request $request){

        # VALIDATION
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        # USER CREATE
        $user = new User();
        $user->name = $request->name;
        $user->email  = $request->email;
        $user->password  = Hash::make($request->password);
        $token = hash('sha256', time());
        $user->token = $token;
        $user->status = 0;
        $user->save();

        $verification_link =  url('registration-verify/'.$token.'/'.$request->email);
        $subject = "Registration Verification";
        $message = "To compelete registration, please click on the link below: <br>";
        $message .= "<a href='".$verification_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Your registration is compeleted. Please check your email for verification. If you do not find the email in your inbox please check your spam folder.');

    }

    /**
     * Registration Verify
     */
    public function registration_verify(){

    }

    /**
     * Login
     */
    public function login(){
        return view('front.login');
    }


   
}
