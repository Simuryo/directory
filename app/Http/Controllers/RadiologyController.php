<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rate;
use App\RadiologySection;

class RadiologyController extends Controller
{
	  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rate = Rate::where('code', 'radiology')->first();
        $title = $rate->name;
        $radiology_sections = RadiologySection::all();

        return view('rates.radiology.index', compact('title','radiology_sections') );
    }
}
