<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function store(DepartmentRequest $request)
    {
        $data = $request->only(['deptname', 'hod', 'email', 'no_courses', 'status', 'no_students']);
        $this->departmentService->createDepartment($data);

        session()->flash('notify', 'Successfully registered department');
        return redirect('/department');
    }

    public function show()
    {
        $departments = $this->departmentService->getAllDepartments();
        return view('admin.department.all', ['departments' => $departments]);
    }

    public function list()
    {
        $departments = $this->departmentService->getAllDepartments();
        return response()->json(['result' => $departments], 200);
    }

    public function destroy(DepartmentRequest $request)
    {
        $this->departmentService->deleteDepartment($request->deptid);

        session()->flash('delete', 'Successfully Deleted');
        return redirect('/department');
    }
}
