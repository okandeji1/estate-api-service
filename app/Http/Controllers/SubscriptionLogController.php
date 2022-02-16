<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionLogRequest;
use App\Http\Requests\UpdateSubscriptionLogRequest;
use App\Models\SubscriptionLog;
use Ramsey\Uuid\Uuid;

class SubscriptionLogController extends Controller
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
     * @param  \App\Http\Requests\StoreSubscriptionLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionLog  $subscriptionLog
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionLog $subscriptionLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriptionLogRequest  $request
     * @param  \App\Models\SubscriptionLog  $subscriptionLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionLogRequest $request, SubscriptionLog $subscriptionLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionLog  $subscriptionLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionLog $subscriptionLog)
    {
        //
    }
}
