<?php

namespace App\Repositories;

use App\Models\Note;
use App\Repositories\Interfaces\NoteRepositoryInterface;

class NoteRepository implements NoteRepositoryInterface
{
    public function getAllNotes()
    {
        return Note::all();
    }

    public function getNoteById($id)
    {
        return Note::find($id);
    }

    public function createNote(array $data)
    {
        return Note::create($data);
    }

    public function updateNote($id, array $data)
    {
        $note = Note::find($id);
        $note->update($data);
        return $note;
    }

    public function deleteNote($id)
    {
        return Note::destroy($id);
    }
}
