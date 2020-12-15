<?php

namespace App\Http\Controllers\Cv;
 
use App\Models\Gender; 
use App\Models\MaritalStatus;
use App\Models\PersonalInformation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StorePersonalInformation;

class PersonalInformationController extends Controller
{
    
    protected $gender;
    protected $maritalStatus;
    protected $info;
    
    public function __construct(Gender $gender, MaritalStatus $maritalStatus, PersonalInformation $info)
    {
        $this->middleware('auth'); 
        $this->gender = $gender;
        $this->maritalStatus = $maritalStatus;
        $this->info = $info;
        $this->authorizeResource(PersonalInformation::class);  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('cv.information.index', ['information'=>$this->info->findInfoAuth()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.information.create', ['genders'=>$this->gender->all(),'maritalStatus'=>$this->maritalStatus->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePersonalInformation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonalInformation $request)
    {
        $this->info->createPersonalInfo($request->all());
        return redirect()->route('personal_informations.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalInformation $personalInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalInformation $personalInformation)
    {

        return view('cv.information.edit',['info'=>$personalInformation, 'genders'=>$this->gender->all(),'maritalStatus'=>$this->maritalStatus->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StorePersonalInformation  $request
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function update(StorePersonalInformation $request, PersonalInformation $personalInformation)
    {
        $personalInformation->updatePersonalInfo($request->all(), $personalInformation); 
        return redirect()->route('personal_informations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalInformation $personalInformation)
    {
        //
    }
}
