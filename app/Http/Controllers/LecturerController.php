<?php

namespace App\Http\Controllers;

use App\Services\LecturerService;
use App\Http\Requests\LecturerRequest;
use Illuminate\Http\Request;
use Session;

class LecturerController extends Controller
{
    protected $lecturerService;

    public function __construct(LecturerService $lecturerService)
    {
        $this->lecturerService = $lecturerService;
        $this->middleware('auth');
    }

    public function index()
    {
        $lecturers = $this->lecturerService->getAllLecturers();
        return view('admin.professor.all', compact('lecturers'));
    }

    public function create()
    {
        return view('admin/professor/add');
    }

    public function store(LecturerRequest $request)
    {
        $this->lecturerService->createLecturer($request);

        Session::flash('flash_message', 'Lecturer successfully added!');
        return redirect('/home');
    }

    public function edit($id)
    {
        $lecturer = $this->lecturerService->findLecturer($id);
        return view('admin/professor/profile', ['lecturer' => $lecturer]);
    }

    public function update(Request $request, $id)
    {
        $lecturer = $this->lecturerService->findLecturer($id);
        $data = $request->only([
            'fullname', 'address', 'mobileno', 'dob', 'department',
            'description', 'gender', 'country', 'state'
        ]);
        $this->lecturerService->updateLecturer($lecturer, $data);

        Session::flash('flash_message', 'Lecturer successfully updated!');
        return redirect('/home');
    }

    public function destroy($id)
    {
        $lecturer = $this->lecturerService->findLecturer($id);
        $this->lecturerService->deleteLecturer($lecturer);

        Session::flash('flash_message', 'Lecturer successfully deleted!');
        return redirect('/home');
    }
}
