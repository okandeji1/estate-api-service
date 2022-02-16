<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;
use App\Models\PropertyType;
use Ramsey\Uuid\Uuid;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $propertyTypes = PropertyType::all();
            return response()->json([
                'success' => true,
                'message' => 'Property type(s) found',
                'data' => $propertyTypes,
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
     * @param  \App\Http\Requests\StorePropertyTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyTypeRequest $request)
    {
        try {
            // Code here...
            $propertyType = new PropertyType();
            foreach ($request->safe() as $key => $value) {
                $propertyType->$key = $value;
            }

            $propertyType->uuid = Uuid::uuid4();
            $propertyType->save();

            return response()->json([
                'success' => true,
                'data' => $propertyType,
                'message' => 'New property type created successfully',
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyType $propertyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyTypeRequest  $request
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyTypeRequest $request, PropertyType $propertyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyType $propertyType)
    {
        //
    }
}
