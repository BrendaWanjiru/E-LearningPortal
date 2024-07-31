<?php

namespace App\Services\Interfaces;

interface NoteServiceInterface
{
    public function getAllNotes();
    public function getNoteById($id);
    public function createNote(array $data);
    public function updateNote($id, array $data);
    public function deleteNote($id);
}
