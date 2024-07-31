<?php

namespace App\Repositories;

use App\Department;

class DepartmentRepository
{
    public function create(array $data)
    {
        return Department::create($data);
    }

    public function all()
    {
        return Department::all();
    }

    public function delete($id)
    {
        return Department::where('deptid', '=', $id)->delete();
    }
}
