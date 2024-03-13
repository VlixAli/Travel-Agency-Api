<?php

namespace App\Http\Controllers;

use App\Http\Resources\TourResource;
use App\Models\Role;
use App\Models\Tour;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Models\Travel;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Travel $travel)
    {
        $tours = Tour::where('travel_id', $travel->id)
            ->filter($request->query())
            ->orderBy('starting_date')
            ->paginate()->withQueryString();
        return TourResource::collection($tours);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourRequest $request, Travel $travel)
    {
        $tour = Tour::create([
            'travel_id' => $travel->id,
            'name' => $request->name,
            'starting_date' => Carbon::parse($request->starting_date),
            'ending_date' => Carbon::parse($request->ending_date),
            'price' => $request->price,
        ]);

        return new TourResource($tour);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourRequest $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
