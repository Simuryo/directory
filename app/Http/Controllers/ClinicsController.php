<?php

namespace App\Http\Controllers;

use App\Clinic;

use App\Http\Requests\ClinicValidationRequest;

use Illuminate\Http\Request;

class ClinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Clinic Schedules";
        $clinics = Clinic::all();
        return view('clinics.index', compact('title','clinics') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'New Clinic Form';
        return view('clinics.create', compact('title') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicValidationRequest $request)
    {
        $clinic = Clinic::create([
            'name' => request('name'),
            'ext' => request('ext'),
        ]);

        return redirect('/clinics')
                ->with('notification', [
                    'title' => 'Created!',
                    'message' =>'New Clinic successfully created!',
                    'class' => 'success'
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        $title = $clinic->name;

        return view('clinics.show', compact('title', 'clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        $title = "Edit Clinic Form";
        return view('clinics.edit', compact('title', 'clinic') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicValidationRequest $request, Clinic $clinic)
    {
        $clinic->update( [
            'name'      => request('name'),
            'ext'       => request('ext'),
        ] );

        return redirect('clinics/'.$clinic->id )
                ->with('notification', [
                    'title' => 'Updated!',
                    'message' =>'Clinic successfully updated!',
                    'class' => 'success'
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        //
    }
}
