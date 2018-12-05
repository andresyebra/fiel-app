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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/area','AreaController@index');
Route::get('/area/index','AreaController@index');
Route::post('/area/create','AreaController@create');

Route::get('/companies','CompanyController@index');
Route::get('/companies/index','CompanyController@index');
Route::post('/companies/create','CompanyController@create');

Route::get('/employees','EmployeeController@index');
Route::get('/employees/index','EmployeeController@index');
Route::post('/employees/create','EmployeeController@create');
Route::get('/employees/id/{id}', 'EmployeeController@getEmployeeById');

Route::get('/job','JobController@index');
Route::get('/job/index','JobController@index');
Route::post('/job/create','JobController@create');
Route::get('/job/id/{id}', 'JobController@getJobsById');

Route::get('/evaluate','EvaluationController@index');
Route::get('/evaluate/index','EvaluationController@index');
Route::post('/evaluate/create','EvaluationController@create');
Route::get('/evaluate/id/{id}', 'EvaluationController@getEmployeeByIdEvaluate');