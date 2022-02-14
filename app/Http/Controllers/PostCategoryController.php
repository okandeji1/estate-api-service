<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Models\PostCategory;

class PostCategoryController extends Controller
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
     * @param  \App\Http\Requests\StorePostCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostCategoryRequest  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        //
    }
}
