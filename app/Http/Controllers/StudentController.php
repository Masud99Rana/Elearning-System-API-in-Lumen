<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $students = Student::all();

        return $this->createSuccessResponse($students, 200);
    }

    public function show($id)
    {
        $student = Student::find($id);

        if($student)
        {
            return $this->createSuccessResponse($student, 200);
        }

        return $this->createErrorResponse("The student whith id {$id}, does not exists", 404);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        $student = Student::create($request->all());

        return $this->createSuccessResponse("The student with id {$student->id} has been created", 201);
    }

    public function update(Request $request)
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }

    function validateRequest($request)
    {
        $rules =
        [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'career' => 'required|in:engineering,math,physics'
        ];

        $this->validate($request, $rules);
    }
}
