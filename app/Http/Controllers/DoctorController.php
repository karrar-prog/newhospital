<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;

class DoctorController extends Controller
{

    public function newDoctor()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $doctors = Doctor::where("HospitalName", $_SESSION["HOSPITAL_NAME"])->get();

        return view("doctor.add_new", ["Doctors" => $doctors]);

    }


    public function deleteDoctor()
    {
        $id = Input::get("id");
        $doctor = Doctor::find($id);
        $doctor->delete();

     return redirect("newdoctor");
    }

    public function save()
    {
        $originalDoctorName = Input::get("OriginalDoctorName", "");

        if (!empty($originalDoctorName)) {
            $doctor = Doctor::where("Name", $originalDoctorName)->first();
        } else
            $doctor = new Doctor();

        if ($doctor == null)
            $doctor = new Doctor();

        $doctor->Name = Input::get("Name");
        $doctor->Password = Input::get("password");
        $doctor->Email = Input::get("email");
        $doctor->Phone = Input::get("phone");
        $doctor->Type = "2";
        $doctor->HospitalName = $_SESSION["HOSPITAL_NAME"];

        try {
            $success = $doctor->save();
            return redirect()->guest('newdoctor')->with('message', 'تمت الاضافة بنجاح');;

        } catch (QueryException $e) {
            dd($e);
            return redirect()->guest('newdoctor')->with('message', 'لم تتم الاضافة  !!');;
        }
    }

    public function changePassword()
    {
        $name = Input::get("Name", "");
        $doctor = Doctor::where("Name", $name)->first();
        if (!$doctor)
            return ["success" => false];

        $doctor->Password = Input::get("Password");

        try {
            $success = $doctor->save();
            return ["success" => $success];
        } catch (QueryException $e) {
            return ["success" => false];
        }

    }


}
