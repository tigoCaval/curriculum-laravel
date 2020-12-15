<?php

namespace App\Http\Controllers\Cv;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreObjective;
use App\Models\Objective;

class ObjectiveController extends Controller
{

    protected $objective;

    public function __construct(Objective $objective)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Objective::class);  
        $this->objective = $objective;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('cv.objective.index', ['objective'=>$this->objective->findObjectiveAuth()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.objective.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreObjective $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObjective $request)
    {
        $this->objective->createObjective($request->all());
        return redirect()->route('objectives.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function show(Objective $objective)
    {
        return view('cv.objective.show',['objective'=>$objective]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function edit(Objective $objective)
    {
        return view('cv.objective.edit',['objective'=>$objective]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreObjective  $request
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function update(StoreObjective $request, Objective $objective)
    {
        $objective->updateObjective($request->all(), $objective);
        return redirect()->route('objectives.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        $objective->deleteObjective($objective);
        return redirect()->route('objectives.index');
    }
}
