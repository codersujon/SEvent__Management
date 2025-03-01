<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\FrontController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHomeBannerController;




## FRONTEND
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

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