<?php

namespace App\Http\Controllers;

use App\Lecturer;
use Illuminate\Http\Request;
use App\Http\Requests\LecturerRequest;
use Auth\Validator;
use Auth;
use Image;
use Session;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $lecturers = Lecturer::all();
		return view('admin.professor.all', compact('lecturers'));
    }


    public function create()
    {
        return view('admin/professor/add');
    }


    public function store(LecturerRequest $request)
    {
        $lecturer = $request ->file('img');
        $filename = $lecturer->getClientOriginalName();
        Image::make($lecturer)->resize(200, 200)->save(public_path('admin/upload/lecturer/'. $filename));

        $lecturer = Lecturer::create([
            'fullname' => $request['fullname'],
            'address' => $request['address'],
            'mobileno' => $request['mobileno'],
            'dob' => $request['dob'],
            'department' => $request['department'],
            'description' => $request['description'],
            'img' => $filename,
            'gender' => $request['gender'],
            'country' => $request['country'],
            'state' => $request['state']
        ]);
        Session::flash('flash_message', 'Lecturer successfully added!');
        return redirect('/home');
    }


    public function show(Lecturer $lecturer)
    {
        //
    }

    public function edit(Lecturer $lecturer, $id)
    {
        $lecturers = Lecturer::find($id);
        return view('admin/professor/profile', ['lecturer' => $lecturers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
