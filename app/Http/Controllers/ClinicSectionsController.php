<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\ClinicSection;

use App\Http\Requests\ClinicSectionValidationRequest;

use Illuminate\Http\Request;


class ClinicSectionsController extends Controller
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
    public function create(Clinic $clinic)
    {
        $title = "New Clinic Section Form";
        return view('clinics.sections.create', compact('title', 'clinic') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicSectionValidationRequest $request, Clinic $clinic)
    {
        $section = $clinic->addSection( request(['name']) );

        return redirect('clinics/'.$clinic->id)
                ->with('notification', [
                    'title' => 'Created!',
                    'message' =>'New Section successfully created for this Clinic!',
                    'class' => 'success'
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClinicSection  $clinicSection
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicSection $clinicSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClinicSection  $clinicSection
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic, ClinicSection $section)
    {
        //dd( $clinic->id, $section->id );
        $title = "Edit Clinic Section Form";
        return view('clinics.sections.edit', compact('title', 'clinic', 'section') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClinicSection  $clinicSection
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicSectionValidationRequest $request, Clinic $clinic, ClinicSection $section)
    {
        $clinic->sections()->where('id', $section->id)->update([ 'name' => request('name') ]);

        return redirect('clinics/'.$clinic->id)
                ->with('notification', [
                    'title' => 'Updated!',
                    'message' =>'Section successfully updated for this Clinic!',
                    'class' => 'success'
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClinicSection  $clinicSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicSection $clinicSection)
    {
        //
    }
}
