<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\ClinicSection;
use App\ClinicSectionSchedule;

use App\Http\Requests\ClinicSectionScheduleValidationRequest;

use Illuminate\Http\Request;

class ClinicSectionSchedulesController extends Controller
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
    public function create(Clinic $clinic, ClinicSection $section)
    {
        $title = "New Schedule Form";
        return view('clinics.sections.schedules.create', compact('title', 'clinic', 'section') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicSectionScheduleValidationRequest $request, Clinic $clinic, ClinicSection $section)
    {
        $section->addSchedule( request(['title', 'operating_hours']) );

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
     * @param  \App\ClinicSectionSchedule  $clinicSectionSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicSectionSchedule $clinicSectionSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClinicSectionSchedule  $clinicSectionSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic, ClinicSection $section, ClinicSectionSchedule $schedule)
    {
        $title = "Edit Schedule Form";
        return view('clinics.sections.schedules.edit', compact('title', 'clinic', 'section', 'schedule') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClinicSectionSchedule  $clinicSectionSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicSectionScheduleValidationRequest $request, Clinic $clinic, ClinicSection $section, ClinicSectionSchedule $schedule)
    {
        $schedule->update([ 'title' => request('title'), 'operating_hours' => request('operating_hours') ]);

        return redirect('clinics/'.$clinic->id)
        ->with('notification', [
            'title' => 'Updated!',
            'message' =>'Schedule successfully updated for '.$section->name.' Clinic Section!',
            'class' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClinicSectionSchedule  $clinicSectionSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicSectionSchedule $clinicSectionSchedule)
    {
        //
    }
}
