<?php

namespace App\Observers;

use App\Models\Note;

class NoteObserver
{
    public function creating(Note $note)
    {
        // Code to execute before a note is created
    }

    public function updating(Note $note)
    {
        // Code to execute before a note is updated
    }

    // Add other methods as needed
}
