<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'verified'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/wiki', 'PostsController@index');
    Route::get('/wiki/create', 'PostsController@create');
    Route::get('/wiki/{title}', 'PostsController@show')->name('wiki.show');

    Route::post('/wiki/store', 'PostsController@store');

    Route::get('users', 'FollowController@index')->name('users');
    Route::get('user/{id}', 'FollowController@show')->name('user.view');
    Route::post('ajaxRequest', 'FollowController@ajaxRequest')->name('ajaxRequest');
    
    Route::get('/profile', 'ProfilesController@index');
    Route::post('/profile', 'ProfilesController@upload');
    Route::get('/profile/{id}', 'ProfilesController@show');
  

    Route::get('tags', 'TagsController@index');
    Route::post('tags', 'TagsController@create');
    Route::get('tags/{name}', 'TagsController@show')->name('tags.show');

    Route::get('/courses', 'CoursesController@index');
    Route::post('/courses', 'CoursesController@create');
    Route::get('/courses/{title}', 'CoursesController@show')->name('courses.show');

    Route::get('{title}/create', 'CoursesController@sub_index')->name('courses.create')->middleware('AuthResource');
    Route::post('courses/create', 'CoursesController@sub_create');
    Route::get('{name}', 'CoursesController@sub_show')->name('blog.show');
});
