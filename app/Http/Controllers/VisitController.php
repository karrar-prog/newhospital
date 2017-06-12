<?php

namespace App\Http\Controllers;

use App\Model\AllVisit;
use App\Model\Patient;
use App\Model\Visit;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Input;

class VisitController extends Controller
{

    public function visit()
    {
        $personalID = Input::get("PersonalID" , "");
        $address = Input::get("Address" , "");

        $patient = Patient::where("PersonalID" , $personalID )->where("Address" , $address)->first();
        if (!$patient)
            return ["success" => false];

        $pcr = Input::get("PCR" , "");
        $treatment1 = Input::get("Treatment1" , "");
        $treatment2 = Input::get("Treatment2" , "");
        $date = Input::get("Date" , Carbon::now("Asia/Baghdad"));

        $visit = new AllVisit();
        $visit->Patient_ID = $patient->ID;
        $visit->PCR = $pcr;
        $visit->Treatment1 = $treatment1;
        $visit->Treatment2 = $treatment2;
        $visit->Date = new DateTime();
        $visit->save();

        if (!empty(trim($pcr)))
        {
            $singleVisit = new Visit();
            $singleVisit->Patient_ID = $patient->ID;
            $singleVisit->PCR = $pcr;
            $singleVisit->Treatment1 = $treatment1;
            $singleVisit->Treatment2 = $treatment2;
            $singleVisit->Date = new DateTime();;
            $singleVisit->save();
        }

        return ["success" => true];

    }

}
