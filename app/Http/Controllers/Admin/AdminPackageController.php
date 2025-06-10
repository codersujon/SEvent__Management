<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminPackageController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $packages = DB::table('packages')->orderBy('item_order', 'asc')->get();
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
        # For Insert Using Eloquent is Best Practice
        $package = Package::create($request->validated());

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
        $package = Package::findOrFail($id);
        return view('admin.package.edit', compact('package'));
    }

    /**
     * Update
     */
    public function update(StorePackageRequest $request, $id)
    {
        $package = Package::findOrFail($id);
        $package->update($request->validated());

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
}
