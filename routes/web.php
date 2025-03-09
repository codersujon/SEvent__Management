<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\FrontController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHomeBannerController;
use App\Http\Controllers\Admin\AdminHomeWelcomeController;
use App\Http\Controllers\Admin\AdminHomeCounterController;
use App\Http\Controllers\Admin\AdminSpeakerController;
use App\Http\Controllers\Admin\AdminScheduleDayController;
use App\Http\Controllers\Admin\AdminScheduleController;


## FRONTEND
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/speakers', [FrontController::class, 'speakers'])->name('speakers');
Route::get('/speaker/{slug}', [FrontController::class, 'speaker'])->name('speaker');
Route::get('/schedule', [FrontController::class, 'schedule'])->name('schedule');

# USER LOGIN & REGISTRATION
Route::get('/registration', [FrontController::class, 'registration'])->name('registration');
Route::post('/registration', [FrontController::class, 'registration_submit'])->name('registration_submit');
Route::get('/registration-verify/{token}/{email}', [FrontController::class, 'registration_verify'])->name('registration_verify');
Route::get('/login', [FrontController::class, 'login'])->name('login');
Route::post('/login', [FrontController::class, 'login_submit'])->name('login_submit');
Route::get('/forget-password', [FrontController::class, 'forget_password'])->name('forget_password');
Route::post('/forget-password', [FrontController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}', [FrontController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password/{token}/{email}', [FrontController::class, 'reset_password_submit'])->name('reset_password_submit');


## USER
Route::middleware('auth')->prefix('attendee')->group(function(){
    Route::get('/profile', [FrontController::class, 'profile'])->name('attendee_profile');
    Route::post('/profile', [FrontController::class, 'profile_submit'])->name('attendee_profile_submit');
    Route::get('/dashboard', [FrontController::class, 'dashboard'])->name('attendee_dashboard');
    Route::get('/logout', [FrontController::class, 'logout'])->name('attendee_logout');
});

## ADMIN
Route::middleware('admin')->prefix('admin')->group(function(){
    Route::get('/profile', [AdminAuthController::class, 'profile'])->name('admin_profile');
    Route::post('/profile', [AdminAuthController::class, 'profile_submit'])->name('admin_profile_submit');
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/home-banner', [AdminHomeBannerController::class, 'index'])->name('admin_home_banner');
    Route::post('/home-banner', [AdminHomeBannerController::class, 'update'])->name('admin_home_banner_update');
    Route::get('/home-welcome', [AdminHomeWelcomeController::class, 'index'])->name('admin_home_welcome');
    Route::post('/home-welcome', [AdminHomeWelcomeController::class, 'update'])->name('admin_home_welcome_update');
    Route::get('/home-counter', [AdminHomeCounterController::class, 'index'])->name('admin_home_counter');
    Route::post('/home-counter', [AdminHomeCounterController::class, 'update'])->name('admin_home_counter_update');
    Route::get('/speaker/index', [AdminSpeakerController::class, 'index'])->name('admin_speaker_index');
    Route::get('/speaker/create', [AdminSpeakerController::class, 'create'])->name('admin_speaker_create');
    Route::post('/speaker/store', [AdminSpeakerController::class, 'store'])->name('admin_speaker_store');
    Route::get('/speaker/edit/{id}', [AdminSpeakerController::class, 'edit'])->name('admin_speaker_edit');
    Route::post('/speaker/update/{id}', [AdminSpeakerController::class, 'update'])->name('admin_speaker_update');
    Route::get('/speaker/delete/{id}', [AdminSpeakerController::class, 'destroy'])->name('admin_speaker_delete');

    Route::get('/schedule-day/index', [AdminScheduleDayController::class, 'index'])->name('admin_schedule_day_index');
    Route::get('/schedule-day/create', [AdminScheduleDayController::class, 'create'])->name('admin_schedule_day_create');
    Route::post('/schedule-day/store', [AdminScheduleDayController::class, 'store'])->name('admin_schedule_day_store');
    Route::get('/schedule-day/edit/{id}', [AdminScheduleDayController::class, 'edit'])->name('admin_schedule_day_edit');
    Route::post('/schedule-day/update/{id}', [AdminScheduleDayController::class, 'update'])->name('admin_schedule_day_update');
    Route::get('/schedule-day/delete/{id}', [AdminScheduleDayController::class, 'destroy'])->name('admin_schedule_day_delete');


    Route::get('/schedule/index', [AdminScheduleController::class, 'index'])->name('admin_schedule_index');
    Route::get('/schedule/create', [AdminScheduleController::class, 'create'])->name('admin_schedule_create');
    Route::post('/schedule/store', [AdminScheduleController::class, 'store'])->name('admin_schedule_store');
    Route::get('/schedule/edit/{id}', [AdminScheduleController::class, 'edit'])->name('admin_schedule_edit');
    Route::post('/schedule/update/{id}', [AdminScheduleController::class, 'update'])->name('admin_schedule_update');
    Route::get('/schedule/delete/{id}', [AdminScheduleController::class, 'destroy'])->name('admin_schedule_delete');
    
});

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/login', [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
    Route::get('/forget-password', [AdminAuthController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password', [AdminAuthController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
});