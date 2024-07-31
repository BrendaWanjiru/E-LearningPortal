<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    // Specify the table name if it does not follow Laravel's convention
    protected $table = 'lecturers';

    // Define which attributes are mass assignable
    protected $fillable = [
        'fullname', 'address', 'mobileno', 'dob', 'department', 'description', 'img', 'gender', 'country', 'state'
    ];

    // Define relationships with other models

    /**
     * Get the courses taught by the lecturer.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'lectid');
    }

    /**
     * Get the department the lecturer belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department');
    }

    // Define any custom methods for the Lecturer model

    /**
     * Get the lecturer's full name.
     */
    public function getFullName()
    {
        return $this->fullname;
    }

    /**
     * Get the lecturer's age.
     */
    public function getAge()
    {
        return now()->diffInYears($this->dob);
    }
}
