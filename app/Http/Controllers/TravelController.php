<?php

namespace App\Http\Controllers;

use App\Http\Resources\TravelResource;
use App\Models\Travel;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::where('is_public', true)->paginate();
        return TravelResource::collection($travels);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelRequest $request)
    {
        $travel = Travel::create([
            'is_public' => $request->is_public,
            'name' => $request->name,
            'description' => $request->description,
            'number_of_days' => $request->number_of_days,
        ]);

        return new TravelResource($travel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        $travel->update($request->validated());
        return new TravelResource($travel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        //
    }
}
