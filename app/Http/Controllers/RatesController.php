<?php

namespace App\Http\Controllers;

use App\Rate;

use App\Http\Requests\RateValidationRequest;

use Illuminate\Http\Request;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Service Rates";
        $rates = Rate::all();
        return view('rates.index', compact('title','rates') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "New Service Rates Form";
        return view('rates.create', compact('title') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RateValidationRequest $request)
    {
        $rate = Rate::create([
            'name' => request('name'), 
            'code' => request('code'), 
            'icon' => request('icon') 
        ]);

        return redirect('rates/')
                ->with('notification', [
                    'title' => 'Created!',
                    'message' =>'New Service Rate successfully created!',
                    'class' => 'success'
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rate  $rates
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        $title = $rate->name;
        return view('rates.show', compact('title','rate') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate  $rates
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        $title = "Edit Service Rates Form";
        return view('rates.edit', compact('title', 'rate') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rate  $rates
     * @return \Illuminate\Http\Response
     */
    public function update(RateValidationRequest $request, Rate $rate)
    {
        $rate->update([
            'name' => request('name'),
            'icon' => request('icon'),
        ]);

        return redirect('rates/radiology')
                ->with('notification', [
                    'title' => 'Updated!',
                    'message' =>'Radiology Service Rate successfully updated!',
                    'class' => 'success'
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rate  $rates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rates)
    {
        //
    }
}
