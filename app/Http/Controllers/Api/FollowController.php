<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $offerId)
    {
        $validated = $request->validate([
            'news' => 'required|array'
        ]);

        $offer = Offer::find($offerId);

        if (!$offer){
            return response()->json(['message' => 'Offer not found'], 404);
        }

        $followsData = collect($validated['news'])->map(function($newsItem) use ($offer) {
            return [
                'offer_id' => $offer->id,
                'news' => $newsItem
            ];
        });

        $offer->follows()->createMany($followsData);

        return response()->json(['message' => 'News added correctly', 'offer' => $offer->load('follows')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
