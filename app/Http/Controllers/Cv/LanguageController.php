<?php

namespace App\Http\Controllers\Cv;

use App\Models\Language;
use App\Models\ReadingLanguage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreLanguage;
use App\Models\SpeakLanguage;
use App\Models\WritingLanguage;

class LanguageController extends Controller
{

    protected $language;

    public function __construct(Language $language)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Language::class);  
        $this->language = $language; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cv.language.index', ['languages'=>$this->language->languageAuth(5), 
        'readingLanguage'=>ReadingLanguage::all(),
        'writingLanguage'=>WritingLanguage::all(),
        'speakLanguage'=>SpeakLanguage::all()
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.language.create', ['readingLanguage'=>ReadingLanguage::all(),
         'writingLanguage'=>WritingLanguage::all(),
         'speakLanguage'=>SpeakLanguage::all()
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLanguage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguage $request)
    {
        $this->language->createLanguage($request->all()); 
        return redirect()->route('languages.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return view('cv.language.show',['language'=>$language]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
       return  view('cv.language.edit', [
         'language'=>$language,  
         'readingLanguage'=>ReadingLanguage::all(),
         'writingLanguage'=>WritingLanguage::all(),
         'speakLanguage'=>SpeakLanguage::all()
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreLanguage  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLanguage $request, Language $language)
    {
        $language->updateLanguage($request->all(), $language);    
        return redirect()->route('languages.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->deleteLanguage($language);
        return redirect()->route('languages.index'); 
    }

}
