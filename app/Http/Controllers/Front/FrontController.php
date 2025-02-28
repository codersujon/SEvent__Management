<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
    public function registration_verify($token, $email){
       $user =  User::where('token', $token)->where('email', $email)->first();
       if(!$user){
            return redirect()->route('login');
       }
       $user->token = "";
       $user->status = 1;
       $user->update();

       return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');
    }

    /**
     * Login
     */
    public function login(){
        return view('front.login');
    }

    /**
     * Login Submit
     */
    public function login_submit(Request $request){
        
        # VALIDATION
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $check = $request->all();

        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
            'status' => 1,
        ];

        if(Auth::guard('web')->attempt($data)){
            return redirect()->route('attendee_dashboard')->with('success', 'You are logged in successfully!');
        }else{
            return redirect()->route('login')->with('error', 'The information you entered is incorrect! Please try again!');
        }

    }

    /**
     * Dashboard
     */
    public function dashboard(){
        return view('attendee.dashboard');
    }
   
    /**
     * Attendee Logout
     */
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success', 'Logout is successful!');
    }

    /**
     * Attendee Profile
     */
    public function profile(){
        return view('attendee.profile');
    }

}
