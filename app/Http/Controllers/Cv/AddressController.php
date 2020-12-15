<?php

namespace App\Http\Controllers\Cv;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreAddress;
use App\Models\Address;

class AddressController extends Controller
{
 
    protected $address; 
    
    public function __construct(Address $address)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Address::class);
        $this->address = $address;   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cv.address.index', ['address'=>$this->address->findAddressAuth()]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.address.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAddress  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddress $request)
    {
        $this->address->createAddress($request->all()); 
        return redirect()->route('addresses.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('cv.address.edit',['address'=>$address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreAddress $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAddress $request, Address $address)
    {
        $address->updateAddress($request->all(), $address);
        return redirect()->route('addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
