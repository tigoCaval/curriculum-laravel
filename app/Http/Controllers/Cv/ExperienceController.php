<?php

namespace App\Http\Controllers\Cv;

use App\Models\Experience;
use App\Domain\Formatting\DateBr;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreExperience;

class ExperienceController extends Controller
{

    protected $experience;
    protected $date;

    public function __construct(Experience $experience, DateBr $date)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Experience::class); 
        $this->experience = $experience; 
        $this->date = $date;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cv.experience.index', ['experiences'=>$this->experience->experienceAuth(5),'date'=>$this->date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExperience  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperience $request)
    {
        $this->experience->createExperience($request->all()); 
        return redirect()->route('experiences.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return view('cv.experience.show',['experience'=>$experience,'date'=>$this->date]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('cv.experience.edit',['experience'=>$experience]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreExperience  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExperience $request, Experience $experience)
    {
        $experience->updateExperience($request->all(), $experience);
        return redirect()->route('experiences.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->deleteExperience($experience); 
        return redirect()->route('experiences.index'); 
    }
}
