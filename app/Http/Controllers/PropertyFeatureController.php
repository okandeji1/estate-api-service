<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyFeatureRequest;
use App\Http\Requests\UpdatePropertyFeatureRequest;
use App\Models\PropertyFeature;
use App\Models\Property;
use App\Models\Feature;
use Ramsey\Uuid\Uuid;

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
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();

            $property = Property::where('uuid', $validated['property_id'])->first();

            if(!$property){
                return response()->json([
                    'success' => false,
                    'message' => 'Property type not found'
                ], 400);
            }

            $feature = Feature::where('uuid', $validated['feature_id'])->first();

            if(!$feature){
                return response()->json([
                    'success' => false,
                    'message' => 'Property category not found'
                ], 400);
            }

            $property_id = $property->id;
            $feature_id = $feature->id;

            $propertyFeature = new PropertyFeature();
            $propertyFeature->uuid = Uuid::uuid4();
            $propertyFeature->property_id = $property_id;
            $propertyFeature->feature_id = $feature_id;
            $propertyFeature->save();

            return response()->json([
                'success' => true,
                'data' => $propertyFeature,
                'message' => 'New property feature added successfully'
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
