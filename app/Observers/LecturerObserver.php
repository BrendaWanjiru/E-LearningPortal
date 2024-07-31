<?php

namespace App\Observers;

use App\Lecturer;

class LecturerObserver
{
    public function created(Lecturer $lecturer)
    {
        // Logic to handle after a lecturer is created
    }

    public function updated(Lecturer $lecturer)
    {
        // Logic to handle after a lecturer is updated
    }

    public function deleted(Lecturer $lecturer)
    {
        // Logic to handle after a lecturer is deleted
    }
}
