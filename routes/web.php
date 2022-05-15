<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->post('/api/register', 'AuthController@register');
$router->post('/api/login', 'AuthController@login');


// Course Endpoints
$router->get('/api/courses', 'CourseController@index');
$router->post('/api/courses', 'CourseController@store');
$router->put('/api/courses/{id}', 'CourseController@update');
$router->delete('/api/courses/{id}', 'CourseController@destroy');


$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['middleware' => 'auth'], function () use ($router) {

        // User Endpoints
    $router->get('/users', 'UserController@index');
    $router->post('/users', 'UserController@store');
    $router->put('/users/{id}', 'UserController@update');
    $router->delete('/users/{id}', 'UserController@destroy');

    // Role Endpoints
    $router->get('/roles', 'RoleController@index');
    $router->post('/roles', 'RoleController@store');

    // User_Details Endpoints
    $router->get('/user_details', 'UserDetailController@index');
    $router->post('/user_details', 'UserDetailController@store');
    $router->put('/user_details/{id}', 'UserDetailController@update');
    $router->delete('/user_details/{id}', 'UserDetailController@destroy');


    // User_Course Endpoints
    $router->get('/userCourses', 'UserCourseController@index');
    $router->post('/userCourses', 'UserCourseController@store');
    $router->put('/userCourses/{id}', 'UserCourseController@update');
    $router->delete('/userCourses/{id}', 'UserCourseController@destroy');

    // Threads Endpoints
    $router->get('/threads', 'ThreadController@index');
    $router->post('/threads', 'ThreadController@store');
    $router->put('/threads/{id}', 'ThreadController@update');
    $router->delete('/threads/{id}', 'ThreadController@destroy');

    // Reply Endpoints
    $router->get('/replies', 'ReplyController@index');
    $router->post('/replies', 'ReplyController@store');
    $router->put('/replies/{id}', 'ReplyController@update');
    $router->delete('/replies/{id}', 'ReplyController@destroy');

    //Logout Endpoint
        $router->post('/logout', 'AuthController@logout');

    });

});
