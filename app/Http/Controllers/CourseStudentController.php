<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;

class CourseStudentController extends Controller
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

    public function index($course_id)
    {
        $course = Course::find($course_id);

        if($course)
        {
            $students = $course->students;

            return $this->createSuccessResponse($students, 200);
        }

        return $this->createErrorResponse('Does not exists a course with the given id', 404);
    }

    public function store()
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }
}
