<?php

namespace App\Http\Controllers\Cv;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Domain\Formatting\CurriculumBase;

class CurriculumController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     * @return [type]
     */
    public function index()
    {
        $cv = new CurriculumBase();   
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($cv->getCurriculum());  
        return $pdf->stream(); 
    }


}
