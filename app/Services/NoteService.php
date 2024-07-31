<?php

namespace App\Services;

use App\Repositories\Interfaces\NoteRepositoryInterface;
use App\Services\Interfaces\NoteServiceInterface;

class NoteService implements NoteServiceInterface
{
    protected $noteRepository;

    public function __construct(NoteRepositoryInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function getAllNotes()
    {
        return $this->noteRepository->getAllNotes();
    }

    public function getNoteById($id)
    {
        return $this->noteRepository->getNoteById($id);
    }

    public function createNote(array $data)
    {
        return $this->noteRepository->createNote($data);
    }

    public function updateNote($id, array $data)
    {
        return $this->noteRepository->updateNote($id, $data);
    }

    public function deleteNote($id)
    {
        return $this->noteRepository->deleteNote($id);
    }
}
