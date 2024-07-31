<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Auth\Validator;
use App\Http\Requests\CourseRequest;
use Auth;
use Session;
use DB;

class CourseController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function create()
    {
        return view('admin.course.add');
    }


    public function store(CourseRequest $request)
    {
        $course = Course::create([
            'csname' => $request['csname'],
            'cscode' => $request['cscode'],
            'status' => $request['status'],
            'description' => $request['description'],
            'level' => $request['level'],
            'deptid' => $request['deptid'],
            'lectid' => $request['lectid'],
            'url' => $request['url']
        ]);
        Session::flash('flash_message', 'Successfully registered course');
        return redirect('/admincourse');
    }

    public function show(Course $course)
    {
        $course = Course::all();
        return view('admin.course.all', ['course' => $course]);
    }

    public function showcourse(Course $course)
    {
        $course =  DB::table('courses')
                            ->leftJoin('departments', 'courses.deptid' ,  '=', 'departments.deptid')
                            ->leftJoin('lecturers', 'courses.lectid' ,  '=', 'lecturers.id')
                            ->get();

        return response()->json(['course' => $course], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $searchQuery = Course::where('cscode','LIKE','%'.$search.'%')->get();
        return response()->json(['search' => $searchQuery], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
