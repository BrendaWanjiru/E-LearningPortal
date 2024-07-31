<?php

namespace App\Observers;

use App\Department;

class DepartmentObserver
{
    public function created(Department $department)
    {
        // Logic to handle after a department is created
    }

    public function deleted(Department $department)
    {
        // Logic to handle after a department is deleted
    }
}
