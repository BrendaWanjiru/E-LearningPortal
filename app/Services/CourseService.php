<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function createCourse(array $data)
    {
        return $this->courseRepository->create($data);
    }

    public function getAllCourses()
    {
        return $this->courseRepository->all();
    }

    public function searchCourses($search)
    {
        return $this->courseRepository->search($search);
    }

    public function getCourseDetails()
    {
        return $this->courseRepository->getCourseDetails();
    }
}
