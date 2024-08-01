<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Specify the table name if it does not follow Laravel's convention
    protected $table = 'courses';

    // Define which attributes are mass assignable
    protected $fillable = [
        'csname', 'cscode', 'status', 'description', 'level', 'deptid', 'lectid', 'url'
    ];

    // Define any relationships with other models
    public function department()
    {
        return $this->belongsTo(Department::class, 'deptid');
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lectid');
    }
}
