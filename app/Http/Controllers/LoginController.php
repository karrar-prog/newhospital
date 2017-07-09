<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (isset($_SESSION["Login"]) && $_SESSION["Login"] == true)
            return redirect("/patient");

        return view("login.login");
    }

    public function login()
    {
        if (isset($_SESSION["Login"]) && $_SESSION["Login"] == true)
            return redirect("/patient");

        $email = Input::get("email");
        $password = Input::get("password");

        $doctor = Doctor::where("Email" , $email)->where("Password" , $password)->first();

        if ($doctor)
        {
            $_SESSION["Login"] = true;
            $_SESSION["ID"] = $doctor->ID;
            $_SESSION["Name"] = $doctor->Name;
            $_SESSION["Email"] = $doctor->Email;
            $_SESSION["USER_TYPE"] = $doctor->Type;
            $_SESSION["HOSPITAL_NAME"] = $doctor->HospitalName;
            return redirect("/patient");
        }
        else
        {
            $_SESSION["LOGIN_SUCCESS"] = false;
            return redirect("/login");
        }
    }

    public function main()
    {
        if (isset($_SESSION["Login"]) && $_SESSION["Login"] == true)
            return redirect("/patient");
        else
            return redirect("/login");
    }

    public function logout()
    {
        unset($_SESSION["Login"]);
        unset($_SESSION["Name"]);
        unset($_SESSION["Email"]);
        unset($_SESSION["USER_TYPE"]);
        unset($_SESSION["ID"]);
        unset($_SESSION["HOSPITAL_NAME"]);
        return redirect("/login");
    }

}
