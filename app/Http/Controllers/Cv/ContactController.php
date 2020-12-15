<?php

namespace App\Http\Controllers\Cv;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreContact;

class ContactController extends Controller
{

    protected $contact; 
    
    public function __construct(Contact $contact)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Contact::class);
        $this->contact = $contact;   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('cv.contact.index', ['contact'=>$this->contact->findContactAuth()]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.contact.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreContact  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $this->contact->createContact($request->all());
        return redirect()->route('contacts.index');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('cv.contact.edit',['contact'=>$contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreContact  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContact $request, Contact $contact)
    {
        $contact->updateContact($request->all(), $contact);
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
