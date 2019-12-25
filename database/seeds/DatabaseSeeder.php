<?php

use App\Course;
use App\Student;
use App\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Teacher::truncate();
        Student::truncate();
        Course::truncate();
        DB::table('course_student')->truncate();
        
        
        factory(Teacher::class, 50)->create();
        factory(Student::class, 500)->create();

        factory(Course::class, 40)->create()->each(function($course)
        	{
        		$course->students()->attach(array_rand(range(1,500), 40));
        	});
    }
}
