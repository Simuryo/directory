<?php

namespace App\Http\Controllers;

use App\RadiologySection;
use App\RadiologySectionEntry;
use Illuminate\Http\Request;

class RadiologySectionEntriesController extends Controller
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
    public function create( RadiologySection $section )
    {
        $title = "New "$section->name." Entry Form";
        return view('rates.radiology.section.en')
    }

    /**s
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
     * @param  \App\RadiologySectionEntry  $radiologySectionEntry
     * @return \Illuminate\Http\Response
     */
    public function show(RadiologySectionEntry $radiologySectionEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RadiologySectionEntry  $radiologySectionEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(RadiologySectionEntry $radiologySectionEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RadiologySectionEntry  $radiologySectionEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadiologySectionEntry $radiologySectionEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RadiologySectionEntry  $radiologySectionEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadiologySectionEntry $radiologySectionEntry)
    {
        //
    }
}
