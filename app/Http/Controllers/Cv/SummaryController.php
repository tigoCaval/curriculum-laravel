<?php

namespace App\Http\Controllers\Cv;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreSummary;
use App\Models\Summary;

class SummaryController extends Controller
{

    protected $summary;

    public function __construct(Summary $summary)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Summary::class);  
        $this->summary = $summary;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cv.summary.index', ['summary'=>$this->summary->findSummaryAuth()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.summary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSummary  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSummary $request)
    {
        $this->summary->createSummary($request->all());
        return redirect()->route('summaries.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function show(Summary $summary)
    {
        return view('cv.summary.show',['summary'=>$summary]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function edit(Summary $summary)
    {
        return view('cv.summary.edit',['summary'=>$summary]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreSummary  $request
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSummary $request, Summary $summary)
    {
        $summary->updateSummary($request->all(), $summary);
        return redirect()->route('summaries.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Summary $summary)
    {
        $summary->deleteSummary($summary);
        return redirect()->route('summaries.index');
    }
}
