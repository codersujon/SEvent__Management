<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;

class AdminHomeBannerController extends Controller
{
    /**
     * index
     */
    public function index(){
        $home_banner  = HomeBanner::where('id', 1)->first();
        return view('admin.home_banner.index', compact('home_banner'));
    }
}
