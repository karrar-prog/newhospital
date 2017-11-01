<?php

namespace App\Http\Controllers;

use App\hospital\patient\report\PatientReporter;
use App\Model\AllVisit;
use App\Model\Doctor;
use App\Model\Patient;
use App\Model\Visit;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{

    public function isExist()
    {

        $personalId = $this->convertArabicNumbersToEnglishNumbers(Input::get("PersonalID", ""));
        $address = Input::get("Address", "");

        $patient = Patient::where("PersonalID", $personalId)->where("Address", $address)->get();

        if (count($patient) > 0)
            return ["exist" => true];
        else
            return ["exist" => false];

    }

    public function save()
    {
        $personalId = $this->convertArabicNumbersToEnglishNumbers(Input::get("OPID", ""));
        $address = Input::get("OA", "");

        if (!empty($personalId) && !empty($address)) {
            $patient = Patient::where("PersonalID", $personalId)->where("Address", $address)->get()->first();
        } else
            $patient = new Patient();

        if ($patient == null)
            $patient = new Patient();

        $this->fillPatientFromInput($patient);
        try {
            $success = $patient->save();
            return ["success" => $success];
        } catch (QueryException $e) {
            return ["success" => false];
        }


    }

    public function index()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        if ($_SESSION["USER_TYPE"] == '3') {

            $patients = Patient::orderBy("ID", "DESC")->limit(21)->get();
            return view("patient.index")->with(["patients" => $patients]);
        } else {
            $hospitalName = $_SESSION["HOSPITAL_NAME"];
            $patients = Patient::orderBy("ID", "DESC")->where("HospitalName", $hospitalName)->limit(21)->get();
            return view("patient.index")->with(["patients" => $patients]);
        }

    }

    public function patient($id)
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $patient = Patient::findOrFail($id);
        $visits = AllVisit::where("Patient_ID", $id)->get();

        return view("patient.single_patient")->with(["patient" => $patient, "visits" => $visits]);
    }

    public function search()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $name = Input::get("search");
        if (empty(trim($name))) {

            return $this->index();
        }
        if ($_SESSION["USER_TYPE"] == '3') {
            $name = "%" . $name . "%";

            $patients = Patient::where("Name", "LIKE", $name)->orderBy("ID", "DESC")->get();
            return view("patient.index")->with(["patients" => $patients]);
        } else {
            $name = "%" . $name . "%";
            $hospitalName = $_SESSION["HOSPITAL_NAME"];
            $patients = Patient::where("Name", "LIKE", $name)->where("HospitalName", $hospitalName)->orderBy("ID", "DESC")->get();
            return view("patient.index")->with(["patients" => $patients]);
        }

    }

    public function showReport()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        if ($_SESSION["USER_TYPE"] == 1 || $_SESSION["USER_TYPE"] == 3) {
            $doctors = Doctor::all(["Name"])->toArray();
        } else {
            $doctors = Doctor::where("HospitalName", $_SESSION["HOSPITAL_NAME"])->get(["Name"])->toArray();
        }
        $hospital_names = Doctor::select(["HospitalName"])->groupBy('HospitalName')->get()->toArray();
        return view("patient.report", ["doctors" => $doctors , "hospital_names"=>$hospital_names]);
    }

    public function report()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $inputs = Input::all();
        if ($_SESSION["USER_TYPE"] != '1' && $_SESSION["USER_TYPE"] != '3') {
            $inputs["hospital"] = $_SESSION["HOSPITAL_NAME"];
        }
      // dd($inputs);
        $reporter = new PatientReporter($inputs);
        $result = $reporter->find();

        return view("patient.result", ["result" => $result]);
    }

    public function showExist()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        return view("patient.check_exist");
    }

    public function exist()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $personalId = $this->convertArabicNumbersToEnglishNumbers(Input::get("PersonalID", ""));
        $address = Input::get("address", "");

        $patient = Patient::where("PersonalID", $personalId)->where("Address", $address)->get();

        if (count($patient) > 0) {
            $response = ["exist" => true, "name" => $patient[0]->Name];
        } else
            $response = ["exist" => false, "personalId" => $personalId, "address" => $address];

        return view("patient.check_exist")->with(["response" => $response]);
    }

    private function fillPatientFromInput($patient)
    {
        $patient->Name = Input::get("Name", "");
        $patient->FileNumber = Input::get("FileNumber", "");
        $patient->Phone = Input::get("Phone", "");
        $patient->Age = Input::get("Age", "");
        $patient->Gender = Input::get("Gender", "");
        $patient->Address = Input::get("Address", "");
        $patient->Work = Input::get("Work", "");
        $patient->SD = Input::get("SD", "");
        $patient->Status = Input::get("Status", "");
        $patient->Diagnose = Input::get("Diagnose", "");
        $patient->DiagnoseMethod = Input::get("DiagnoseMethod", "");
        $patient->DiseaseType = Input::get("DiseaseType", "");
        $patient->DiseaseReason = Input::get("DiseaseReason", "");
        $patient->DoctorName = Input::get("DoctorName", "");
        $patient->LiverBioposy = Input::get("LiverBioposy", "");
        $patient->Fibroscan = Input::get("Fibroscan", "");
        $patient->DM = Input::get("DM", "");
        $patient->CRF = Input::get("CRF", "");
        $patient->RegisterDate = Input::get("RegisterDate", "");
        $patient->HospitalName = Input::get("HospitalName", "");
        $patient->PersonalID = $this->convertArabicNumbersToEnglishNumbers(Input::get("PersonalID", ""));
    }

    private function fillPatientFromInput2($patient)
    {
        $patient->Name = Input::get("patientName", "");
        $patient->FileNumber = Input::get("fileNumber", "");
        $patient->Phone = Input::get("phone", "");
        $patient->Age = Input::get("age", "");
        $patient->Gender = Input::get("gender", "");
        $patient->Address = Input::get("address", "");
        $patient->Work = Input::get("work", "");
        $patient->SD = Input::get("sd", "");
        $patient->Status = Input::get("status", "");
        $patient->Diagnose = Input::get("diagnose", "");
        $patient->DiagnoseMethod = Input::get("diagnoseMethod", "");
        $patient->DiseaseType = Input::get("diseaseType", "");
        $patient->DiseaseReason = Input::get("diseaseReason", "");
        $patient->DoctorName = Input::get("doctorName", "");
        $patient->LiverBioposy = Input::get("liverBioposy", "");
        $patient->Fibroscan = Input::get("fibroscan", "");
        $patient->DM = Input::get("dm", "");
        $patient->CRF = Input::get("crf", "");
        $patient->RegisterDate = Carbon::now("Asia/Baghdad");
        $patient->HospitalName = Input::get("hospital", "");
        $patient->PersonalID = $this->convertArabicNumbersToEnglishNumbers(Input::get("personalId", ""));
    }

    public function showSimpleReport()
    {

        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        if ($_SESSION["USER_TYPE"] == 1 || $_SESSION["USER_TYPE"] == 3) {
            $doctors = Doctor::all(["Name"])->toArray();
        } else {
            $doctors = Doctor::where("HospitalName", $_SESSION["HOSPITAL_NAME"])->get(["Name"])->toArray();
        }
        //  $hospital_names =   $doctors = Doctor::all(["HospitalName"])->toArray();
        $hospital_names = Doctor::select(["HospitalName"])->groupBy('HospitalName')->get()->toArray();

        return view("patient.simple_report", ["doctors" => $doctors, "hospital_names" => $hospital_names]);
    }

    public function simpleReport()
    {
        if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != true) {
            $_SESSION["LOGIN_MESSAGE"] = "You Should Login First";
            return redirect("/login");
        }

        $inputs = Input::all();
        if ($_SESSION["USER_TYPE"] != '1' && $_SESSION["USER_TYPE"] != '3') {
            $inputs["hospital"] = $_SESSION["HOSPITAL_NAME"];
        }

        $reporter = new PatientReporter($inputs);
        $result = $reporter->findSimple();
        $hospital_names = Doctor::select(["HospitalName"])->groupBy('HospitalName')->get()->toArray();
        return view("patient.simple_report_result", ["result" => $result , "hospital_names"=>$hospital_names]);
    }

    public function showAddNew()
    {
        $doctors = Doctor::where("HospitalName", $_SESSION["HOSPITAL_NAME"])->get(["Name"])->toArray();
        return view("patient.add_patient", ["doctors" => $doctors]);
    }

    public function addNew()
    {

        $patient = new Patient();
        $this->fillPatientFromInput2($patient);


        try {
            $success = $patient->save();

            $this->handleVisit("first", $patient);
            $this->handleVisit("last", $patient);

            Session::flash("success", $success);
            if ($success)
                return redirect()->back();
            else
                return redirect()->back()->withInput(Input::all());
        } catch (QueryException $e) {
            Session::flash("success", false);
            return redirect()->back()->withInput(Input::all());
        }
    }

    private function handleVisit($vt, $patient)
    {
        if (!$patient)
            return;

        $pcr = Input::get("{$vt}PCR", "");

        $treatment1 = Input::get("{$vt}Treatment1", "");
        $treatment2 = Input::get("{$vt}Treatment2", "");
        $date = Input::get("{$vt}Date", Carbon::now("Asia/Baghdad"));

        $visit = new AllVisit();
        $visit->Patient_ID = $patient->ID;
        $visit->PCR = $pcr;
        $visit->Treatment1 = $treatment1;
        $visit->Treatment2 = $treatment2;
        $visit->Date = $date;
        $visit->save();

        if (strcmp($pcr, "Not detected") == 0)
            $pcr = "";

        if (!empty(trim($pcr))) {
            $singleVisit = new Visit();
            $singleVisit->Patient_ID = $patient->ID;
            $singleVisit->PCR = $pcr;
            $singleVisit->Treatment1 = $treatment1;
            $singleVisit->Treatment2 = $treatment2;
            $singleVisit->Date = $date;
            $singleVisit->save();
        }
    }

    public function showDelete($id)
    {
        $patient = Patient::where("ID", "=", $id)->first();
        if (!$patient)
            return redirect("/");

        return view("patient.delete_patient", ["patient" => $patient]);
    }

    public function delete($id)
    {
        $patient = Patient::where("ID", "=", $id)->first();
        if ($patient)
            $patient->forceDelete();

        return redirect("/");
    }

    public function showUpdate($id)
    {
        $patient = Patient::where("ID", "=", $id)->first();
        if (!$patient)
            return redirect("/");
        $doctors = Doctor::all(["Name"])->toArray();
        return view("patient.update_patient", ["patient" => $patient, "doctors" => $doctors]);
    }

    public function update($id)
    {
        $otherPatientWithSameIdentity = Patient::where("PersonalID", $this->convertArabicNumbersToEnglishNumbers(Input::get("personalId")))
            ->where("Address", Input::get("Address"))
            ->where("ID", "<>", $id)
            ->get();

        if (count($otherPatientWithSameIdentity) > 0) {
            Session::flash("success", false);
            return redirect()->back()->withInput(Input::all());
        }


        $patient = Patient::where("ID", "=", $id)->first();
        if ($patient) {
            $this->fillPatientFromInput2($patient);
            $patient->save();
            return redirect("/patient/" . $id);
        } else {
            Session::flash("success", false);
            return redirect()->back()->withInput(Input::all());
        }

    }

    public function convertArabicNumbersToEnglishNumbers($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }


}
