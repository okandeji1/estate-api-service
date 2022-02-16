<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use Ramsey\Uuid\Uuid;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $features = Feature::all();
            return response()->json([
                'success' => true,
                'data' => $features,
                'message' => 'Feature(s) found',
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
     * @param  \App\Http\Requests\StoreFeatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeatureRequest $request)
    {
        try {

            $feature = new Feature();

            foreach ($request->safe() as $key => $value) {
                $feature->$key = $value;
            }

            $feature->uuid = Uuid::uuid4();
            $feature->save();

            return response()->json([
                'success' => true,
                'data' => $feature,
                'message' => 'New feature added successfully',
            ], 201);
        } catch (\Throwable $th) {
            throw $th;
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
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeatureRequest  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        //
    }
}
