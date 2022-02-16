<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Package;
use App\Models\PackageCategory;
use Ramsey\Uuid\Uuid;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $packages = Package::all();
            return response()->json([
                'success' => true,
                'data' => $packages,
                'message' => 'Package(s) found',
            ], 500);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->safe()->only('package_category_id');

            // Check if exist in db
            $packageCategory = PackageCategory::where('uuid', $validated['package_category_id'])->first();
            // Check error
            if(!$packageCategory){
                return response()->json([
                    'success' => false,
                    'message' => 'package category not found'
                ], 400);
            }
            // Destructure foreign keys
            $package_category_id = $packageCategory->id;
            // Package Object (Model)
            $package = new Package();
            // Iterating validated data and adding it to package object
            // This is to make sure that exempted payload data are not include in the package object
            foreach ($request->safe()->except('package_category_id') as $key => $value) {
                $package->$key = $value;
            }
            // Assign values
            $package->uuid = Uuid::uuid4();
            $package->package_category_id = $package_category_id;
            $package->save();

            return response()->json([
                'success' => true,
                'data' => $package,
                'message' => 'New package added successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => Null,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
