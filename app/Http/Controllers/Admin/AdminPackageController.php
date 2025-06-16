<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageFacility;
use Illuminate\validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminPackageController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $packages = Package::with(
            ['facilities' => function($query){
                $query->orderBy('item_order', 'asc');
            }
        ])->orderBy('item_order', 'asc')->get();
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store 
     */
    public function store(StorePackageRequest $request)
    {

        foreach($request->facility as $value){
           $arr_facility[] = $value;
        }

        foreach($request->status as $value){
           $arr_status[] = $value;
        }

        foreach($request->order as $value){
           $arr_order[] = $value;
        }

        # For Insert Using Eloquent is Best Practice
        $package = Package::create($request->validated());

        for($i=0; $i<count($arr_facility); $i++){
           $package_facility =  new PackageFacility();
           $package_facility->package_id = $package->id;
           $package_facility->name = $arr_facility[$i];
           $package_facility->status = $arr_status[$i];
           $package_facility->item_order = $arr_order[$i];
           $package_facility->save();
        }

        return redirect()
                ->route('admin_package_index')
                ->with(
                    $package ?  'success' : 'error', 
                    $package ? 'Package created successfully!' : 'Package creation failed!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $package = Package::where('id', $id)->first();
        $package_facilities = PackageFacility::where('package_id', $id)->orderBy('item_order', 'asc')->get();
        return view('admin.package.edit', compact('package', 'package_facilities'));
    }

    /**
     * Update
     */
    public function update(StorePackageRequest $request, $id)
    {
        foreach($request->facility as $value){
           $arr_facility[] = $value;
        }

        foreach($request->status as $value){
           $arr_status[] = $value;
        }

        foreach($request->order as $value){
           $arr_order[] = $value;
        }

        $package = Package::findOrFail($id);
        $package->update($request->validated());

        for($i=0; $i<count($arr_facility); $i++){
           $package_facility =  new PackageFacility();
           $package_facility->package_id = $package->id;
           $package_facility->name = $arr_facility[$i];
           $package_facility->status = $arr_status[$i];
           $package_facility->item_order = $arr_order[$i];
           $package_facility->save();
        }

        return to_route('admin_package_index')->with('success', 'Package updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return to_route('admin_package_index')->with('success', 'Package deleted successfully!');
    }

    /**
     * Facility Delete
     */
    public function facility_delete($id){
        $package_facility = PackageFacility::where('id', $id)->first();
        $package_facility->delete();

        return redirect()->back()->with('success', 'Package facility deleted successfully!');
    }

    /**
     * Edit Facility Package
     */
    public function facility_edit($id){
        $package_facility = PackageFacility::where('id', $id)->first();
        return view('admin.package.edit_facility', compact('package_facility'));
    }

    /**
     * Update Facility Package
     */
    public function facility_update(Request $request, $id){

        $package_facility = PackageFacility::where('id', $id)->first();

        $request->validate([
            'name' => ['required'],
            'status' => ['required'],
            'item_order' => ['required', 'numeric'],
        ]);

        $package_facility->name = $request->name;
        $package_facility->status = $request->status;
        $package_facility->item_order = $request->item_order;
        $package_facility->update();

        return redirect()->route('admin_package_index')->with('success', 'Package facility updated successfully!');
    }

}
