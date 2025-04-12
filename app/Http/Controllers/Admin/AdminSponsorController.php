<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\SponsorCategory;

class AdminSponsorController extends Controller
{
    /**
     * Index
     */
    public function index(){
        $sponsors = Sponsor::with('sponsor_category')->get();
        return view('admin.sponsor.index', compact('sponsors'));
    }
}
