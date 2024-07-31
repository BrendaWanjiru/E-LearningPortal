<?php

namespace App\Http\Controllers;
use App\Department;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;
use Auth\Validator;
use Auth;
use Session;

class DepartmentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function store(DepartmentRequest $request)
    {
        $department = Department::create([
            'deptname' => $request['deptname'],
            'hod' => $request['hod'],
            'email' => $request['email'],
            'no_courses' => $request['no_courses'],
            'status' => $request['status'],
            'no_students' => $request['no_students']
        ]);

        session()->flash('notify', 'Successfully registered department');
        return redirect('/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $departments = Department::all();
        return view('admin.department.all', ['department'=> $departments]);
    }

    public function list(Department $department)
    {
        $departments = Department::all();
        return response()->json([
            'result' => $departments
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */


    public function destroy(DepartmentRequest $request)
    {

        $deptid= $request->deptid;
        $department = Department::where('deptid', '=', $deptid)->delete();
        session()->flash('delete', 'Successfully Deleted');
        return redirect('/department');


    }
}
