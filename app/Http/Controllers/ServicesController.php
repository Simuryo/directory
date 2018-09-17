<?php

namespace App\Http\Controllers;

use App\Service;

use App\Http\Requests\ServiceValidationRequest;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "BRTTH Services";
        $services = Service::all();
        return view('services.index', compact('title','services') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "New Service Form";
        return view('services.create', compact('title') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceValidationRequest $request)
    {
        //dd( request()->all() );

        $service = Service::create([
            'name' => request('name'),
            'head' => request('head'),
            'position' => request('position'),
        ]);

        return redirect('/services')
                ->with('notification', [
                    'title' => 'Created!',
                    'message' =>'New Service successfully created!',
                    'class' => 'success'
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //dd( is_null( $service->sections ) );
        $title = $service->name;
        return view('services.show', compact('title','service') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $title = "Edit Service Form";
        return view('services.edit', compact('title', 'service') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceValidationRequest $request, Service $service)
    {
        $service->update( [
            'name'      => request('name'),
            'head'      => request('head'),
            'position'  => request('position'),
        ] );

        return redirect('services/'.$service->id )
                ->with('notification', [
                    'title' => 'Updated!',
                    'message' =>'Service successfully updated!',
                    'class' => 'success'
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
