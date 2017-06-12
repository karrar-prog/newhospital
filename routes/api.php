<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/patient/exist" , "PatientController@isExist");
Route::post("/patient/save" , "PatientController@save");

Route::post('/doctor/save', "DoctorController@save");
Route::post('/doctor/change-password', "DoctorController@changePassword");
Route::post('/visit/submit', "VisitController@visit");