<?php

namespace App\Http\Controllers;

use Validator;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileEntryValidationRequest;

use Illuminate\Http\Request;

use App\ProfileEntry;

use Hash;
use Illuminate\Support\MessageBag;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Hospital Profile";
        $profile_entries = ProfileEntry::all();
        return view('profile.index', compact('title','profile_entries') );
    }

    public function store(ProfileEntryValidationRequest $request)
    {

        $profile_entry = ProfileEntry::create(['description' => request('profile_entry')]);

        return redirect()->route('profile')
                        ->with('notification', [
                            'title' => 'Added!',
                            'message' =>'New profile entry successfully added!',
                            'class' => 'success'
                        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileEntry $entry)
    {
        $title = "Edit Profile Entry Form";
        return view('profile.edit', compact('title', 'entry') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileEntryValidationRequest $request, ProfileEntry $entry)
    {
        $entry->update(['description' => request('profile_entry')]);

        return redirect()->route('profile')
                        ->with('notification', [
                            'title' => 'Updated!',
                            'message' =>'Profile entry successfully updated!',
                            'class' => 'success'
                        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete( ProfileEntry $entry)
    {
        $title = "Delete Profile Entry";

        return view('profile.delete', compact('title', 'entry') );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileEntryValidationRequest $request, ProfileEntry $entry)
    {
        if(Hash::check( request('password'), auth()->user()->password )){
            
            $entry->delete();

            return redirect()->route('profile')
                            ->with('notification', [
                                'title' => 'Deleted!',
                                'message' =>'Profile entry successfully deleted!',
                                'class' => 'danger'
                            ]);
        }
        // Wrong Password
        $errors = New MessageBag;
        $errors->add('password', 'Incorrect Password! Please try again.');
        return back()->withErrors($errors);
            
    }
}
