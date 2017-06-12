<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;

class DoctorController extends Controller
{
    public function save()
    {
        $originalDoctorName = Input::get("OriginalDoctorName" , "");

        if (!empty($originalDoctorName))
        {
            $doctor = Doctor::where("Name" , $originalDoctorName)->first();
        }
        else
            $doctor = new Doctor();

        if ($doctor == null)
            $doctor = new Doctor();

        $doctor->Name = Input::get("Name");
        $doctor->Password = Input::get("Password");
        $doctor->Email = Input::get("Email");
        $doctor->Phone = Input::get("Phone");
        $doctor->Type = Input::get("Type");

        try
        {
            $success = $doctor->save();
            return ["success" => $success];
        }
        catch (QueryException $e)
        {
            return ["success" => false];
        }
    }

    public function changePassword()
    {
        $name = Input::get("Name" , "");
        $doctor = Doctor::where("Name" , $name)->first();
        if (!$doctor)
            return ["success" => false];

        $doctor->Password = Input::get("Password");

        try
        {
            $success = $doctor->save();
            return ["success" => $success];
        }
        catch (QueryException $e)
        {
            return ["success" => false];
        }

    }


}
