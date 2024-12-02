<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->action === 'delete')
        {
            $this->destroy($request->id);
            return Redirect::to(route('home'));
        }

        $offers = Offer::get();

        return view('home', compact('offers'));
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $offer = Offer::create([
            'enterprise' => $request->enterprise,
            'position' => $request->position,
            'state' => $request->state
        ]);
        $offer->save();

        return Redirect::to(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offers = Offer::find($id);

        return view('show', compact('offers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offer = Offer::find($id);

        return view('edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $offer = Offer::find($id);

        $offer -> update([
            'enterprise' => $request->enterprise,
            'position' => $request->position,
            'state' => $request->state
        ]);
        $offer->save();
        return Redirect::to(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $offer = Offer::find($id);
        $offer->delete();
    }
}
