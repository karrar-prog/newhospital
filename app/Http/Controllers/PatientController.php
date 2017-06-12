<?php

namespace App\Http\Controllers;

use App\hospital\patient\report\PatientReporter;
use App\Model\AllVisit;
use App\Model\Patient;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;

class PatientController extends Controller
{

    public function isExist()
    {

        $personalId = Input::get("PersonalID" , "");
        $address = Input::get("Address" , "");

        $patient = Patient::where("PersonalID" , $personalId)->where("Address" , $address)->get();

        if (count($patient) > 0)
            return ["exist" => true];
        else
            return ["exist" => false];

    }

    public function save()
    {
        $personalId = Input::get("OPID" , "");
        $address = Input::get("OA" ,  "");

        if (!empty($personalId) && !empty($address))
        {
            $patient = Patient::where("PersonalID" , $personalId)->where("Address" , $address)->get()->first();
        }
        else
            $patient = new Patient();

        if ($patient == null)
            $patient = new Patient();

        $this->fillPatientFromInput($patient);
        try
        {
            $success = $patient->save();
            return ["success" => $success];
        }
        catch (QueryException $e)
        {
            return ["success" => false];
        }


    }

    public function index()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $doctorName = $_SESSION["Name"];
        $patients = Patient::orderBy("ID" , "DESC")->where("DoctorName" , $doctorName)->limit(100)->get();
        return view("patient.index")->with(["patients" => $patients]);
    }

    public function patient($id)
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $patient = Patient::findOrFail($id);
        $visits = AllVisit::where("Patient_ID" , $id)->get();

        return view("patient.single_patient")->with(["patient" => $patient , "visits" => $visits]);
    }

    public function search()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $name = Input::get("search");
        if (empty(trim($name)))
        {
            return $this->index();
        }

        $name = "%" . $name . "%";
        $doctorName = $_SESSION["Name"];
        $patients = Patient::where("Name" , "LIKE" , $name)->where("DoctorName" , $doctorName)->orderBy("ID" , "DESC")->limit(100)->get();
        return view("patient.index")->with(["patients" => $patients]);
    }

    public function showReport()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        if ($_SESSION["USER_TYPE"] != '1')
        {
            return view("patient.no_permission");
        }

        return view("patient.report");
    }

    public function report()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        if ($_SESSION["USER_TYPE"] != '1')
        {
            return view("patient.no_permission");
        }

        $reporter = new PatientReporter(Input::all());
        $result = $reporter->find();
        return view("patient.result" , ["result" => $result]);
    }

    public function showExist()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        return view("patient.check_exist");
    }

    public function exist()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $personalId = Input::get("PersonalID" , "");
        $address = Input::get("Address" , "");

        $patient = Patient::where("PersonalID" , $personalId)->where("Address" , $address)->get();

        if (count($patient) > 0)
            $response = ["exist" => true , "name" => $patient[0]->Name];
        else
            $response = ["exist" => false , "name" => ($personalId . "-" . $address)];

        return view("patient.check_exist")->with(["response" => $response]);
    }

    private function fillPatientFromInput($patient)
    {
        $patient->Name = Input::get("Name" , "");
        $patient->FileNumber = Input::get("FileNumber" , "");
        $patient->Phone = Input::get("Phone" , "");
        $patient->Age = Input::get("Age" , "");
        $patient->Gender = Input::get("Gender" , "");
        $patient->Address = Input::get("Address" , "");
        $patient->Work = Input::get("Work" , "");
        $patient->SD = Input::get("SD" , "");
        $patient->Status = Input::get("Status" , "");
        $patient->Diagnose = Input::get("Diagnose" , "");
        $patient->DiagnoseMethod = Input::get("DiagnoseMethod" , "");
        $patient->DiseaseType = Input::get("DiseaseType" , "");
        $patient->DiseaseReason = Input::get("DiseaseReason" , "");
        $patient->DoctorName = Input::get("DoctorName" , "");
        $patient->LiverBioposy = Input::get("LiverBioposy" , "");
        $patient->Fibroscan = Input::get("Fibroscan" , "");
        $patient->DM = Input::get("DM" , "");
        $patient->CRF = Input::get("CRF" , "");
        $patient->RegisterDate = Input::get("RegisterDate" , "");
        $patient->HospitalName = Input::get("HospitalName" , "");
        $patient->PersonalID = Input::get("PersonalID" , "");
    }

    public function showSimpleReport()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        if ($_SESSION["USER_TYPE"] != '1')
        {
            return view("patient.no_permission");
        }

        return view("patient.simple_report");
    }

    public function simpleReport()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true)
        {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        if ($_SESSION["USER_TYPE"] != '1')
        {
            return view("patient.no_permission");
        }

        $reporter = new PatientReporter(Input::all());
        $result = $reporter->findSimple();

        return view("patient.simple_report_result" , ["result" => $result]);
    }

}
