<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Session;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function create()
    {
        return view('admin.course.add');
    }

    public function store(CourseRequest $request)
    {
        $data = $request->only(['csname', 'cscode', 'status', 'description', 'level', 'deptid', 'lectid', 'url']);
        $this->courseService->createCourse($data);

        Session::flash('flash_message', 'Successfully registered course');
        return redirect('/admincourse');
    }

    public function show()
    {
        $courses = $this->courseService->getAllCourses();
        return view('admin.course.all', ['courses' => $courses]);
    }

    public function showCourseDetails()
    {
        $courseDetails = $this->courseService->getCourseDetails();
        return response()->json(['course' => $courseDetails], 200);
    }

    public function search(Request $request)
    {
        $searchResults = $this->courseService->searchCourses($request->search);
        return response()->json(['search' => $searchResults], 200);
    }

    public function destroy(Course $course)
    {
        // Implement destroy logic
    }
}
