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

    public function store($course_id, $student_id)
    {
        $course = Course::find($course_id);

        if($course)
        {
            $student = Student::find($student_id);

            if($student)
            {
                if($course->students()->find($student->id))
                {
                    return $this->createErrorResponse("The student with id {$student->id} already exists in the course with id {$course->id}", 409);
                }

                $course->students()->attach($student->id);

                return $this->createSuccessResponse("The student with id {$student->id} was added to the course with id {$course->id}", 201);
            }

            return $this->createErrorResponse("The student with id {$student_id} does not exists", 404);
        }

        return $this->createErrorResponse("The course with id {$course_id}, does not exists", 404);
    }

    public function destroy()
    {
        return __METHOD__;
    }
}
