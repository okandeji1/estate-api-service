<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageCategoryRequest;
use App\Http\Requests\UpdatePackageCategoryRequest;
use App\Models\PackageCategory;

class PackageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackageCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageCategoryRequest $request)
    {
        //
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
