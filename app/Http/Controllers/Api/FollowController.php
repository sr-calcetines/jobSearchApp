<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
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
}
