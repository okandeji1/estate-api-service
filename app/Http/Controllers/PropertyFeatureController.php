<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyFeatureRequest;
use App\Http\Requests\UpdatePropertyFeatureRequest;
use App\Models\PropertyFeature;

class PropertyFeatureController extends Controller
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
     * @param  \App\Http\Requests\StorePropertyFeatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyFeatureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyFeature  $propertyFeature
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyFeature $propertyFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyFeatureRequest  $request
     * @param  \App\Models\PropertyFeature  $propertyFeature
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyFeatureRequest $request, PropertyFeature $propertyFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyFeature  $propertyFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyFeature $propertyFeature)
    {
        //
    }
}
