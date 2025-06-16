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
use App\Http\Controllers\Admin\AdminSpeakerScheduleController;
use App\Http\Controllers\Admin\AdminSponsorCategoryController;
use App\Http\Controllers\Admin\AdminSponsorController;
use App\Http\Controllers\Admin\AdminOrganizerController;
use App\Http\Controllers\Admin\AdminAccommodationController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoGalleryController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPackageController;

## FRONTEND
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/speakers', [FrontController::class, 'speakers'])->name('speakers');
Route::get('/speaker/{slug}', [FrontController::class, 'speaker'])->name('speaker');
Route::get('/schedule', [FrontController::class, 'schedule'])->name('schedule');
Route::get('/sponsors', [FrontController::class, 'sponsors'])->name('sponsors');
Route::get('/sponsor/{slug}', [FrontController::class, 'sponsor'])->name('sponsor');
Route::get('/organizers', [FrontController::class, 'organizers'])->name('organizers');
Route::get('/organizer/{slug}', [FrontController::class, 'organizer'])->name('organizer');
Route::get('/accommodations', [FrontController::class, 'accommodations'])->name('accommodations');
Route::get('/photo-gallery', [FrontController::class, 'photo_gallery'])->name('photo_gallery');
Route::get('/video-gallery', [FrontController::class, 'video_gallery'])->name('video_gallery');
Route::get('/faqs', [FrontController::class, 'faqs'])->name('faqs');
Route::get('/testimonial', [FrontController::class, 'testimonial'])->name('testimonial');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/post/{slug}', [FrontController::class, 'post'])->name('post');



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
    

    Route::get('/speaker-schedule/index', [AdminSpeakerScheduleController::class, 'index'])->name('admin_speaker_schedule_index');
    Route::post('/speaker-schedule/store', [AdminSpeakerScheduleController::class, 'store'])->name('admin_speaker_schedule_store');
    Route::get('/speaker-schedule/delete/{id}', [AdminSpeakerScheduleController::class, 'destroy'])->name('admin_speaker_schedule_destroy');

    ## Sponsor Category
    Route::get('/sponsor-category/index', [AdminSponsorCategoryController::class, 'index'])->name('admin_sponsor_category_index');
    Route::get('/sponsor-category/create', [AdminSponsorCategoryController::class, 'create'])->name('admin_sponsor_category_create');
    Route::post('/sponsor-category/store', [AdminSponsorCategoryController::class, 'store'])->name('admin_sponsor_category_store');
    Route::get('/sponsor-category/edit/{id}', [AdminSponsorCategoryController::class, 'edit'])->name('admin_sponsor_category_edit');
    Route::post('/sponsor-category/update/{id}', [AdminSponsorCategoryController::class, 'update'])->name('admin_sponsor_category_update');
    Route::get('/sponsor-category/delete/{id}', [AdminSponsorCategoryController::class, 'destroy'])->name('admin_sponsor_category_delete');

    ## Sponsor
    Route::get('/sponsor/index', [AdminSponsorController::class, 'index'])->name('admin_sponsor_index');
    Route::get('/sponsor/create', [AdminSponsorController::class, 'create'])->name('admin_sponsor_create');
    Route::post('/sponsor/store', [AdminSponsorController::class, 'store'])->name('admin_sponsor_store');
    Route::get('/sponsor/edit/{id}', [AdminSponsorController::class, 'edit'])->name('admin_sponsor_edit');
    Route::post('/sponsor/update/{id}', [AdminSponsorController::class, 'update'])->name('admin_sponsor_update');
    Route::get('/sponsor/delete/{id}', [AdminSponsorController::class, 'destroy'])->name('admin_sponsor_delete');
    
    # Organizer
    Route::get('/organizer/index', [AdminOrganizerController::class, 'index'])->name('admin_organizer_index');
    Route::get('/organizer/create', [AdminOrganizerController::class, 'create'])->name('admin_organizer_create');
    Route::post('/organizer/store', [AdminOrganizerController::class, 'store'])->name('admin_organizer_store');
    Route::get('/organizer/edit/{id}', [AdminOrganizerController::class, 'edit'])->name('admin_organizer_edit');
    Route::post('/organizer/update/{id}', [AdminOrganizerController::class, 'update'])->name('admin_organizer_update');
    Route::get('/organizer/delete/{id}', [AdminOrganizerController::class, 'destroy'])->name('admin_organizer_delete');

    # Accommodation
    Route::get('/accommodation/index', [AdminAccommodationController::class, 'index'])->name('admin_accommodation_index');
    Route::get('/accommodation/create', [AdminAccommodationController::class, 'create'])->name('admin_accommodation_create');
    Route::post('/accommodation/store', [AdminAccommodationController::class, 'store'])->name('admin_accommodation_store');
    Route::get('/accommodation/edit/{id}', [AdminAccommodationController::class, 'edit'])->name('admin_accommodation_edit');
    Route::post('/accommodation/update/{id}', [AdminAccommodationController::class, 'update'])->name('admin_accommodation_update');
    Route::get('/accommodation/delete/{id}', [AdminAccommodationController::class, 'destroy'])->name('admin_accommodation_delete');

    # Photo Gallery
    Route::get('/photo-gallery/index', [AdminPhotoController::class, 'index'])->name('admin_photo_gallery_index');
    Route::get('/photo-gallery/create', [AdminPhotoController::class, 'create'])->name('admin_photo_gallery_create');
    Route::post('/photo-gallery/store', [AdminPhotoController::class, 'store'])->name('admin_photo_gallery_store');
    Route::get('/photo-gallery/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_gallery_edit');
    Route::post('/photo-gallery/update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_gallery_update');
    Route::get('/photo-gallery/delete/{id}', [AdminPhotoController::class, 'destroy'])->name('admin_photo_gallery_delete');

    # Video Gallery
    Route::get('/video-gallery/index', [AdminVideoGalleryController::class, 'index'])->name('admin_video_gallery_index');
    Route::get('/video-gallery/create', [AdminVideoGalleryController::class, 'create'])->name('admin_video_gallery_create');
    Route::post('/video-gallery/store', [AdminVideoGalleryController::class, 'store'])->name('admin_video_gallery_store');
    Route::get('/video-gallery/edit/{id}', [AdminVideoGalleryController::class, 'edit'])->name('admin_video_gallery_edit');
    Route::post('/video-gallery/update/{id}', [AdminVideoGalleryController::class, 'update'])->name('admin_video_gallery_update');
    Route::get('/video-gallery/delete/{id}', [AdminVideoGalleryController::class, 'destroy'])->name('admin_video_gallery_delete');

    # FAQ
    Route::get('/faq/index', [AdminFaqController::class, 'index'])->name('admin_faq_index');
    Route::get('/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
    Route::get('/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
    Route::get('/faq/delete/{id}', [AdminFaqController::class, 'destroy'])->name('admin_faq_delete');

    # Testimonial
    Route::get('/testimonial/index', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_index');
    Route::get('/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
    Route::get('/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    Route::get('/testimonial/delete/{id}', [AdminTestimonialController::class, 'destroy'])->name('admin_testimonial_delete');

    # Blog Post
    Route::get('/post/index', [AdminPostController::class, 'index'])->name('admin_post_index');
    Route::get('/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
    Route::get('/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
    Route::get('/post/delete/{id}', [AdminPostController::class, 'destroy'])->name('admin_post_delete');

    # Package
    Route::get('/package/index', [AdminPackageController::class, 'index'])->name('admin_package_index');
    Route::get('/package/create', [AdminPackageController::class, 'create'])->name('admin_package_create');
    Route::post('/package/store', [AdminPackageController::class, 'store'])->name('admin_package_store');
    Route::get('/package/edit/{id}', [AdminPackageController::class, 'edit'])->name('admin_package_edit');
    Route::post('/package/update/{id}', [AdminPackageController::class, 'update'])->name('admin_package_update');
    Route::get('/package/delete/{id}', [AdminPackageController::class, 'destroy'])->name('admin_package_delete');

    # Package Facility 
    Route::get('/package/facilities/delete/{id}', [AdminPackageController::class, 'facility_delete'])->name('admin_package_facility_delete');
    
    Route::get('/package/facilities/edit/{id}', [AdminPackageController::class, 'facility_edit'])->name('admin_package_facility_edit');

    Route::post('/package/facilities/update/{id}', [AdminPackageController::class, 'facility_update'])->name('admin_package_facility_update');
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