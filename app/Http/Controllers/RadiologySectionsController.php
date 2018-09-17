<?php

namespace App\Http\Controllers;

use App\RadiologySection;

use App\Http\Requests\RadiologySectionValidationRequest;

use Illuminate\Http\Request;

class RadiologySectionsController extends Controller
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
    public function create()
    {
        $title = "New Radiology Section Form";
        return view('rates.radiology.sections.create', compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RadiologySectionValidationRequest $request)
    {
        $radiology_section = RadiologySection::create([
            'name' => request('name'),
            'code' => request('code'),
            'column_1' => request('column_1'),
            'column_2' => request('column_2'),
            'column_3' => request('column_3'),
        ]);

        return redirect('rates/radiology')
                ->with('notification', [
                    'title' => 'Created!',
                    'message' =>'New Section for Radiology successfully created!',
                    'class' => 'success'
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RadiologySection  $radiologySection
     * @return \Illuminate\Http\Response
     */
    public function show(RadiologySection $radiologySection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RadiologySection  $radiologySection
     * @return \Illuminate\Http\Response
     */
    public function edit(RadiologySection $radiologySection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RadiologySection  $radiologySection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadiologySection $radiologySection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RadiologySection  $radiologySection
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadiologySection $radiologySection)
    {
        //
    }
}
