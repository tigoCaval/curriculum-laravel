<?php

namespace App\Http\Controllers\Cv;

use App\Domain\Formatting\DateBr;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreDocument;
use App\Models\Document;
use App\Models\DriverLicense;

class DocumentController extends Controller
{

    protected $document; 
    protected $date;

    public function __construct(Document $document, DateBr $date)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Document::class);
        $this->document = $document;   
        $this->date = $date;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cv.document.index', ['document'=>$this->document->findDocumentAuth(), 'date'=>$this->date]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.document.create', ['driverLicenses'=>DriverLicense::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDocument  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocument $request)
    {
        $this->document->createDocument($request->all());
        return redirect()->route('documents.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('cv.document.edit',['document'=>$document,'driverLicenses'=>DriverLicense::all()]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreDocument  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDocument $request, Document $document)
    {
        $document->updateDocument($request->all(), $document);
        return redirect()->route('documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
