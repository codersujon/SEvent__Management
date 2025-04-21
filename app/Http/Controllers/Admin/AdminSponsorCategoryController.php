<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SponsorCategory;
use App\Models\Sponsor;

class AdminSponsorCategoryController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $sponsor_categories = SponsorCategory::get();
        return view('admin.sponsor_category.index', compact('sponsor_categories'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.sponsor_category.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {
        # VALIDATION
        $request->validate([
            'name' => ['required'],
        ]);

        $speaker = new SponsorCategory();
        $speaker->name = $request->name;
        $speaker->description = $request->description;
        $speaker->save();

        return redirect()->route('admin_sponsor_category_index')->with('success', 'Sponsor Category is created successfully!');
    }

      /**
     * Edit
     */
    public function edit($id)
    {
        $sponsor_category = SponsorCategory::where('id', $id)->first();
        return view('admin.sponsor_category.edit', compact('sponsor_category'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $sponsor_category = SponsorCategory::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'name' => ['required'],
        ]);

        $sponsor_category->name = $request->name;
        $sponsor_category->description = $request->description;
        $sponsor_category->update();

        return redirect()->route('admin_sponsor_category_index')->with('success', 'Sponsor Category updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::where('sponsor_category_id', $id)->first();

        if($sponsor){
            return redirect()->route('admin_sponsor_category_index')->with('error', 'Sponsor Category is not empty!');
        }

        $sponsor_category = SponsorCategory::where('id', $id)->first();
        $sponsor_category->delete();

        return redirect()->route('admin_sponsor_category_index')->with('success', 'Sponsor Category deleted successfully!');
    }
}
