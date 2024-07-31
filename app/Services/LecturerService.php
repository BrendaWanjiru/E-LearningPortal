<?php

namespace App\Services;

use App\Repositories\LecturerRepository;
use Image;

class LecturerService
{
    protected $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }

    public function getAllLecturers()
    {
        return $this->lecturerRepository->all();
    }

    public function createLecturer($request)
    {
        $img = $request->file('img');
        $filename = $img->getClientOriginalName();
        Image::make($img)->resize(200, 200)->save(public_path('admin/upload/lecturer/'. $filename));

        $data = $request->only([
            'fullname', 'address', 'mobileno', 'dob', 'department',
            'description', 'gender', 'country', 'state'
        ]);
        $data['img'] = $filename;

        return $this->lecturerRepository->create($data);
    }

    public function findLecturer($id)
    {
        return $this->lecturerRepository->find($id);
    }

    public function updateLecturer($lecturer, $data)
    {
        return $this->lecturerRepository->update($lecturer, $data);
    }

    public function deleteLecturer($lecturer)
    {
        return $this->lecturerRepository->delete($lecturer);
    }
}
