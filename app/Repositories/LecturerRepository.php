<?php

namespace App\Repositories;

use App\Lecturer;

class LecturerRepository
{
    public function all()
    {
        return Lecturer::all();
    }

    public function find($id)
    {
        return Lecturer::find($id);
    }

    public function create(array $data)
    {
        return Lecturer::create($data);
    }

    public function update(Lecturer $lecturer, array $data)
    {
        return $lecturer->update($data);
    }

    public function delete(Lecturer $lecturer)
    {
        return $lecturer->delete();
    }
}
