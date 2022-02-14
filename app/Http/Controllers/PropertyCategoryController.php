<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyCategoryRequest;
use App\Http\Requests\UpdatePropertyCategoryRequest;
use App\Models\PropertyCategory;

class PropertyCategoryController extends Controller
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
     * @param  \App\Http\Requests\StorePropertyCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyCategory  $propertyCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyCategory $propertyCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyCategoryRequest  $request
     * @param  \App\Models\PropertyCategory  $propertyCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyCategoryRequest $request, PropertyCategory $propertyCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyCategory  $propertyCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyCategory $propertyCategory)
    {
        //
    }
}
