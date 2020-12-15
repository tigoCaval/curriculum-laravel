<?php

namespace App\Http\Controllers\Cv;

use App\Models\Education;
use App\Models\EducationCourse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreEducation;

class EducationController extends Controller
{

    protected $education;

    public function __construct(Education $education)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Education::class);  
        $this->education = $education;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('cv.education.index', ['education'=>$this->education->findEducationAuth()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.education.create', ['courses'=>EducationCourse::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEducation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducation $request)
    {
        $this->education->createEducation($request->all());
        return redirect()->route('educations.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('cv.education.edit',['education'=>$education,'courses'=>EducationCourse::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreEducation  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEducation $request, Education $education)
    {
        $education->updateEducation($request->all(), $education);
        return redirect()->route('educations.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        //
    }
}
