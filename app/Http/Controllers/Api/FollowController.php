<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        return response()->json(Offer::find($id)->follows, 200);
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
    public function show(string $offerId, string $newsId)
    {
        return response()->json(Offer::find($offerId)->follows[(int)$newsId - 1],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $offerId, string $newsId)
    {
        $follows = Offer::find($offerId)->follows[(int)$newsId - 1];

        $follows->update([
            'offers_id' => $request-> offers_id,
            'news' => $request->news,
        ]);
        return response()->json($follows, 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $offerId, string $newsId)
    {
        Offer::find($offerId)->follows[(int)$newsId - 1]->delete();
    }
}
