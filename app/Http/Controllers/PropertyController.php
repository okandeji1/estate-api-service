<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $properties = Property::all();
            return response()->json([
                'success' => true,
                'data' => $properties,
                'message' => 'Property(s) found',
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->safe()->only(['user_id', 'property_type_id', 'property_category_id']);
            // Process file upload to cloudinary
            if($request->hasFile('images')){
                foreach($request->file('images') as $file){
                    $image = cloudinary()->uploadFile($file->getRealPath())->getSecurePath();
                    // Add to add if more than one (Multiple file upload)
                    $uploadedFileUrl[] = $image;
                }
            }

            // Check if exist in db
            $user = User::where('uuid', $validated['user_id'])->first();

            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 400);
            }

            $propertyType = PropertyType::where('uuid', $validated['property_type_id'])->first();

            if(!$propertyType){
                return response()->json([
                    'success' => false,
                    'message' => 'Property type not found'
                ], 400);
            }

            $propertyCategory = PropertyCategory::where('uuid', $validated['property_category_id'])->first();

            if(!$propertyCategory){
                return response()->json([
                    'success' => false,
                    'message' => 'Property category not found'
                ], 400);
            }

            // Destructure foreign keys
            $property_type_id = $propertyType->id;
            $property_category_id = $propertyCategory->id;
            $user_id = $user->id;

            // Property Object (Model)
            $property = new Property();
            $property->uuid = Uuid::uuid4();

            // Iterating validated data and adding it to property object
            // This is to make sure that exempted payload data are not include in the property object
            // and to remove foreign keys and images
            foreach ($request->safe()->except(['images', 'user_id', 'property_category_id', 'property_type_id']) as $key => $value) {
                $property->$key = $value;
            }
            $property->user_id = $user_id;
            $property->property_category_id = $property_category_id;
            $property->property_type_id = $property_type_id;
            $property->image = json_encode($uploadedFileUrl);
            $property->save();


            return response()->json([
                'success' => true,
                'data' => $property,
                'message' => 'New property added successfully'
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
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
