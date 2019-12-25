<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    
    $router->get('/', function () use ($router) {
        // return $router->app->version();
        // return "Welcome, Masud Rana";
        
        return response()->json([
        	'success' => true,
        	'message' => 'Welcome to my API',
        	'Developer' => 'Masud Rana'
        ]);
    });

    $router->get('/teachers','TeacherController@index');
    $router->post('/teachers','TeacherController@store');
    $router->get('/teachers/{teachers}','TeacherController@show');
    $router->put('/teachers/{teachers}', 'TeacherController@update');
    $router->patch('/teachers/{teachers}', 'TeacherController@update');
    $router->delete('/teachers/{teachers}', 'TeacherController@destroy');

    $router->get('/students', 'StudentController@index');
    $router->post('/students', 'StudentController@store');
    $router->get('/students/{students}', 'StudentController@show');
    $router->put('/students/{students}', 'StudentController@update');
    $router->patch('/students/{students}', 'StudentController@update');
    $router->delete('/students/{students}', 'StudentController@destroy');


    $router->get('/courses', 'CourseController@index');
    $router->get('/courses/{courses}', 'CourseController@show');


    $router->get('/teachers/{teachers}/courses', 'TeacherCourseController@index');
    $router->post('/teachers/{teachers}/courses', 'TeacherCourseController@store');
    $router->put('/teachers/{teachers}/courses/{courses}', 'TeacherCourseController@update');
    $router->patch('/teachers/{teachers}/courses/{courses}', 'TeacherCourseController@update');
    $router->delete('/teachers/{teachers}/courses/{courses}', 'TeacherCourseController@destroy');


    $router->get('/courses/{courses}/students', 'CourseStudentController@index');
    $router->post('/courses/{courses}/students/{students}', 'CourseStudentController@store');
    $router->delete('/courses/{courses}/students/{students}', 'CourseStudentController@destroy');

});



// $router->post('/oauth/access_token', function() use ($router){
//     return response()->json($router->make('oauth2-server.authorizer')->issueAccessToken());
// });
