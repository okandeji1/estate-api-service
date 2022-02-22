<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyCategoryRequest;
use App\Http\Requests\UpdatePropertyCategoryRequest;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use Ramsey\Uuid\Uuid;

class PropertyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $propertyCategories = PropertyCategory::all();
            return response()->json([
                'success' => true,
                'data' => $propertyCategories,
                'message' => 'Property category(s) found',
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
     * @param  \App\Http\Requests\StorePropertyCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyCategoryRequest $request)
    {
        try {
            // Save entity
            $propertyCategory = new PropertyCategory();
            foreach ($request->safe() as $key => $value) {
                $propertyCategory->$key = $value;
            }

            $propertyCategory->uuid = Uuid::uuid4();
            $propertyCategory->save();

            return response()->json([
                'success' => true,
                'data' => $propertyCategory,
                'message' => 'New property category created successfully',
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' => NULL,
                'message' => 'Internal server error',
            ], 500);
        }
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
