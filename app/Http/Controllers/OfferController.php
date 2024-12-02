<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::with('follows')->get();

        return view('home', compact('offers'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offers = Offer::find($id);

        return view('show', compact('offers'));
    }

}
