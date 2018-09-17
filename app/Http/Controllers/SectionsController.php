<?php

namespace App\Http\Controllers;

use App\Service;
use App\Section;

use App\Http\Requests\SectionValidationRequest;

use Illuminate\Http\Request;

class SectionsController extends Controller
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
    public function create( Service $service )
    {
        $title = "New Section Form";
        return view('services.sections.create', compact('title', 'service') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionValidationRequest $request, Service $service)
    {
        $section = $service->addSection( request(['name', 'head', 'operating_hours', 'ext']) );

        return redirect('services/'.$service->id)
                ->with('notification', [
                    'title' => 'Created!',
                    'message' =>'New Section successfully created! for this Service',
                    'class' => 'success'
                ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service, Section $section)
    {

        $title = "Edit Section Form";
        return view('services.sections.edit', compact('title', 'service', 'section') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionValidationRequest $request, Service $service, Section $section)
    {
        $service->sections()
                ->where('id', $section->id)
                ->update([
                    'name'              => request('name'),
                    'head'              => request('head'),
                    'operating_hours'   => request('operating_hours'),
                    'ext'               => request('ext'),
                ]);

        return redirect('services/'.$service->id)
                ->with('notification', [
                    'title' => 'Updated!',
                    'message' =>'Section successfully updated for this Service',
                    'class' => 'success'
                ]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
