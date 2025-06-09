<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\Websitemail;
use App\Models\ScheduleDay;
use App\Models\Speaker;
use App\Models\HomeCounter;
use App\Models\HomeWelcome;
use App\Models\HomeBanner;
use App\Models\SponsorCategory;
use App\Models\Sponsor;
use App\Models\Organiser;
use App\Models\Accommodation;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\Post;

class FrontController extends Controller
{
    /**
     * Home
     */
    public function home(){
        $home_banner = HomeBanner::where('id', 1)->first();
        $home_welcome = HomeWelcome::where('id', 1)->first();
        $home_counter = HomeCounter::where('id', 1)->first();
        $speakers = Speaker::get()->take(4);
        return view('front.home', compact('home_banner', 'home_welcome', 'home_counter', 'speakers'));
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

    /**
     * Profile Submit
     */
    public function profile_submit(Request $request){

         # VALIDATION
         $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'address' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'zip' => ['required'],
        ]);

        $user = User::where('id', Auth::guard('web')->user()->id)->first();

        if($request->photo){
            $request->validate([
                'photo' => ['mimes:jpg, jpeg, png, gif', 'max:10240'],
            ]);
            $final_name = 'user_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            
            if($user->photo != ""){
                @unlink(public_path('uploads/'.$user->photo));
            }
           
            $user->photo = $final_name;
        }

        if($request->password){
            $request->validate([
                'password' => ['required'],
                'confirm_password' => ['required', 'same:password'],
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->update();

        return redirect()->back()->with('success', 'Profile is updated!');
    }


    /**
     * Forget Password
     */
    public function forget_password(){
        return view('front.forget_password');
    }

    /**
     * Forget Password Submit
     */
    public function forget_password_submit(Request $request){

        # VALIDATION
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->back()->with('error', 'Email is not found');
        }

        $token = hash('sha256', time());
        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = "Password Reset";
        $message = "To reset password, please click on the link below:<br>";
        $message .= "<a href='".$reset_link."'>Click Here</a>";
        
        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'We have sent a password reset link to your email. Please check your email. If you do not find the email in your inbox, please check your spam folder.');

    }

    /**
     * Reset Password 
     */
    public function reset_password($token, $email){
        $user = User::where('email', $email)->where('token', $token)->first();
        if(!$user){
            return redirect()->route('login')->with('error', "Token or email is not correct");
        }
        return view('front.reset_password', compact('token', 'email'));
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

        $user = User::where('email', $request->email)->where('token', $request->token)->first();
        $user->password = Hash::make($request->password);
        $user->token = "";
        $user->update();

        return redirect()->route('login')->with('success', 'Password reset is successful. You can login now');
    }


    /**
     * Speakers
     */
    public function speakers(){
        $speakers = Speaker::paginate(4);
        return view('front.speakers', compact('speakers'));
    }

    /**
     * Speaker
     */
    public function speaker($slug){
        $speaker = Speaker::where('slug', $slug)->first();
        if(!$speaker){
            return redirect()->route('speakers')->with('error', "Invalid url");
        }
        $schedules = $speaker->schedules()->with('schedule_day')->get();
        return view('front.speaker', compact('speaker', 'schedules'));
    }

     /**
     * Schedule Day
     */
    public function schedule(){
        $schedule_days = ScheduleDay::with(['schedules' => function($query){
            $query->with('speakers');
        }])
        ->orderBy('order1', 'ASC')->get();
        return view('front.schedule', compact('schedule_days'));
    }

    /**
     * Sponsor
     */
    public function sponsors(){
        $sponsor_categories = SponsorCategory::with('sponsors')->get();
        return view('front.sponsors', compact('sponsor_categories'));
    }

    /**
     * Sponsor
     */
    public function sponsor($slug){
        $sponsor = Sponsor::where('slug', $slug)->first();
        if(!$sponsor){
            return redirect()->route('sponsors');
        }
        return view('front.sponsor', compact('sponsor'));
    }

    /**
     * Organizers
     */
    public function organizers(){
        $organizers = Organiser::paginate(4);
        return view('front.organizers', compact('organizers'));
    }

     /**
     * Organizer
     */
    public function organizer($slug){
        $organizer = Organiser::where('slug', $slug)->first();
        if(!$organizer){
            return redirect()->route('organizers')->with('error', "Invalid url");
        }
        return view('front.organizer', compact('organizer'));
    }

    
     /**
     * Accommodations
     */
    public function accommodations(){
        $accommodations = Accommodation::paginate(4);
        return view('front.accommodations', compact('accommodations'));
    }

     /**
     * Photo Gallery
     */
    public function photo_gallery(){
        $photo_galleries = PhotoGallery::paginate(6);
        return view('front.photo_gallery', compact('photo_galleries'));
    }
    
     /**
     * Video Gallery
     */
    public function video_gallery(){
        $video_galleries = VideoGallery::paginate(6);
        return view('front.video_gallery', compact('video_galleries'));
    }

     /**
     * FAQ
     */
    public function faqs(){
        $faqs = Faq::paginate(6);
        return view('front.faqs', compact('faqs'));
    }

    /**
     * Testimonials
     */
    public function testimonial(){
        $testimonials = Testimonial::get();
        return view('front.testimonial', compact('testimonials'));
    }

    /**
     * Blog
     */
    public function blog(){
        $posts = Post::paginate(6);
        return view('front.blog', compact('posts'));
    }

    /**
     * Post
     */
    public function post($slug){
        $post = Post::where('slug', $slug)->first();
        if(!$post){
            return redirect()->route('blog')->with('error', "Invalid url");
        }
        return view('front.post', compact('post'));
    }
}
