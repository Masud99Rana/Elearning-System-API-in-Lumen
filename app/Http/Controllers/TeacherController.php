<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
        $teachers = Teacher::all();

        return $this->createSuccessResponse($teachers, 200);
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);

        if($teacher)
        {
            return $this->createSuccessResponse($teacher, 200);
        }

        return $this->createErrorResponse("The teacher whith id {$id}, does not exists", 404);
    }


    public function update()
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }
}
