<?php

namespace App\Repositories;

use App\Course;

class CourseRepository
{
    public function create(array $data)
    {
        return Course::create($data);
    }

    public function all()
    {
        return Course::all();
    }

    public function search($search)
    {
        return Course::where('cscode', 'LIKE', '%' . $search . '%')->get();
    }

    public function getCourseDetails()
    {
        return \DB::table('courses')
            ->leftJoin('departments', 'courses.deptid', '=', 'departments.deptid')
            ->leftJoin('lecturers', 'courses.lectid', '=', 'lecturers.id')
            ->get();
    }
}
