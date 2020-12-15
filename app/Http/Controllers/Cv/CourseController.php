<?php

namespace App\Http\Controllers\Cv;

use App\Domain\Formatting\DateBr;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cv\StoreCourse;
use App\Models\Course;
use App\Models\CourseStatus;
use App\Models\CourseType;

class CourseController extends Controller
{

    protected $course;
    protected $date;

    public function __construct(Course $course, DateBr $date)
    {
        $this->middleware('auth'); 
        $this->authorizeResource(Course::class); 
        $this->course = $course; 
        $this->date = $date;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('cv.course.index', ['courses'=>$this->course->courseAuth(5),'date'=>$this->date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.course.create', ['courseTypes'=>CourseType::all(),'courseStatus'=>CourseStatus::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCourse  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourse $request)
    {
        $this->course->createCourse($request->all()); 
        return redirect()->route('courses.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('cv.course.show',['course'=>$course,'date'=>$this->date]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('cv.course.edit',['course'=>$course,'courseTypes'=>CourseType::all(),'courseStatus'=>CourseStatus::all()]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreCourse  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCourse $request, Course $course)
    {
        $course->updateCourse($request->all(), $course);
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->deleteCourse($course);
        return redirect()->route('courses.index');
    }
}
