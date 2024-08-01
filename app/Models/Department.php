<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // Specify the table name if it does not follow Laravel's convention
    protected $table = 'departments';

    // Define which attributes are mass assignable
    protected $fillable = [
        'deptname', 'hod', 'email', 'no_courses', 'status', 'no_students'
    ];

    // Define relationships with other models

    /**
     * Get the courses for the department.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'deptid');
    }

    /**
     * Get the lecturers for the department.
     */
    public function lecturers()
    {
        return $this->hasMany(Lecturer::class, 'department');
    }

    // Define any custom methods for the Department model

    /**
     * Get the total number of students in the department.
     */
    public function totalStudents()
    {
        return $this->no_students;
    }

    /**
     * Get the department head's name.
     */
    public function headOfDepartment()
    {
        return $this->hod;
    }
}
