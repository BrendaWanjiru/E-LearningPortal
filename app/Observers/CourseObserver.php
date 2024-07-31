<?php

namespace App\Observers;

use App\Course;

class CourseObserver
{
    public function created(Course $course)
    {
        // Logic to handle after a course is created
    }

    public function deleted(Course $course)
    {
        // Logic to handle after a course is deleted
    }
}
