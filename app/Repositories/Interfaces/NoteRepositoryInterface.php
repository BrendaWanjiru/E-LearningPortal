<?php

namespace App\Repositories\Interfaces;

interface NoteRepositoryInterface
{
    public function getAllNotes();
    public function getNoteById($id);
    public function createNote(array $data);
    public function updateNote($id, array $data);
    public function deleteNote($id);
}
