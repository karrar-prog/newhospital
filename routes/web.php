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

session_start();

Route::get('/patient', "PatientController@index");
Route::get('/patient/{id}', "PatientController@patient")->where('id', '[0-9]+');
Route::get('/patient/report', "PatientController@showReport");
Route::post('/patient/report', "PatientController@report");
Route::post('/patient/search', "PatientController@search");

Route::get('/patient/exist', "PatientController@showExist");
Route::post('/patient/exist', "PatientController@exist");


Route::get('/patient/add-new', "PatientController@showAddNew");
Route::post('/patient/add-new', "PatientController@addNew");


Route::get('/', "LoginController@main");
Route::get('/login', "LoginController@showLogin");
Route::get('/logout', "LoginController@logout");
Route::post('/login', "LoginController@login");

Route::get('/patient/simple-report', "PatientController@showSimpleReport");
Route::post('/patient/simple-report', "PatientController@simpleReport");


Route::get('/patient/delete/{id}', "PatientController@showDelete");
Route::get('/patient/delete-now/{id}', "PatientController@delete");


Route::get('/patient/update/{id}', "PatientController@showUpdate");
Route::post('/patient/update-now/{id}', "PatientController@update");

Route::get('/newdoctor', "DoctorController@newDoctor");
Route::post('/adddoctor', "DoctorController@save");
Route::get('/delete', "DoctorController@deleteDoctor");