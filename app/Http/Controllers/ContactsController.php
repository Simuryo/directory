<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Service;
use App\Http\Requests\ContactsValidationRequest;

use Illuminate\Http\Request;

class ContactsController extends Controller
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
        $title = "Contacts Form";
        return view('services.contacts.create', compact('title', 'service') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactsValidationRequest $request, Service $service)
    {
        $contacts = $service->addContacts( request(['address', 'telephone', 'contact_person', 'position', 'email']) );

        return redirect('services/'.$service->id)
                ->with('notification', [
                    'title' => 'Added!',
                    'message' =>'Contacts successfully added for this Service!',
                    'class' => 'success'
                ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit( Service $service )
    {
        $title = "Edit Contacts Form";
        return view('services.contacts.edit', compact('title', 'service') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(ContactsValidationRequest $request, Service $service)
    {
        //dd( request()->all() );
        $contacts = $service->contacts()->update( request(['address', 'telephone', 'contact_person', 'position', 'email']) );

        return redirect('services/'.$service->id)
                ->with('notification', [
                    'title' => 'Updated!',
                    'message' =>'Contacts successfully updated for this Service!',
                    'class' => 'success'
                ]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
