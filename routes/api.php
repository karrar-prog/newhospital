<?php



Route::post("/patient/exist" , "PatientController@isExist");
Route::post("/patient/save" , "PatientController@save");

Route::post('/doctor/save', "DoctorController@save");
Route::post('/doctor/change-password', "DoctorController@changePassword");

Route::post('/visit/submit', "VisitController@visit");