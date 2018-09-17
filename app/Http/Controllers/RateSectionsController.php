<?php

namespace App\Http\Controllers;

use App\RateSection;
use App\Rate;
use Illuminate\Http\Request;

class RateSectionsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Rate $rate )
    {
        $title = "New ".$rate->name." Section Form";
        return view('rates.sections.create', compact(['title', 'rate']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RateSection  $rateSection
     * @return \Illuminate\Http\Response
     */
    public function show(RateSection $rateSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RateSection  $rateSection
     * @return \Illuminate\Http\Response
     */
    public function edit(RateSection $rateSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RateSection  $rateSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RateSection $rateSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RateSection  $rateSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(RateSection $rateSection)
    {
        //
    }
}
