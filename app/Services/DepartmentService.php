<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService
{
    protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function createDepartment(array $data)
    {
        return $this->departmentRepository->create($data);
    }

    public function getAllDepartments()
    {
        return $this->departmentRepository->all();
    }

    public function deleteDepartment($id)
    {
        return $this->departmentRepository->delete($id);
    }
}
