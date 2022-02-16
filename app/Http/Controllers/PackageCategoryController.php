<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageCategoryRequest;
use App\Http\Requests\UpdatePackageCategoryRequest;
use App\Models\PackageCategory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class PackageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $packageCategory = PackageCategory::all();
            return response()->json([
                'success' => true,
                'data' => $packageCategory,
                'message' => 'Package category(s) found',
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
     * @param  \App\Http\Requests\StorePackageCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageCategoryRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $packageCategory = new PackageCategory();
            foreach ($request->safe() as $key => $value) {
                $packageCategory->$key = Str::upper($value);
            }

            $packageCategory->uuid = Uuid::uuid4();
            $packageCategory->save();

            return response()->json([
                'success' => true,
                'data' => $packageCategory,
                'message' => 'New package category added successfully',
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
     * @param  \App\Models\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PackageCategory $packageCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageCategoryRequest  $request
     * @param  \App\Models\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageCategoryRequest $request, PackageCategory $packageCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageCategory $packageCategory)
    {
        //
    }
}
