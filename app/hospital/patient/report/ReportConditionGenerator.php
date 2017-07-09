<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-06-10
 * Time: 2:34 AM
 */

namespace App\hospital\patient\report;


use App\utils\condition_generator\ConditionGenerator;
use App\utils\condition_generator\SimpleConditionItem;

class ReportConditionGenerator
{
    private $_params;
    private $_conditionGenerator;

    /**
     * QueryGenerator constructor.
     * @param $_params
     */
    public function __construct($_params)
    {
        $this->_params = $_params;
        $this->_conditionGenerator = new ConditionGenerator(...$this->generateConditionsList());
    }

    public function generate($where = "")
    {
        $this->_conditionGenerator->setInitialWhere($where);
        return $this->_conditionGenerator->generateConditions();
    }

    public function getParams()
    {
        return $this->_conditionGenerator->getParamsArray();
    }

    private function generateConditionsList()
    {
        $conditions = [];
        foreach ($this->_params as $key => $value)
        {
            if (!empty(trim($value)))
            {
                $condition = $this->getConditionFromInput($key, $value);
                if ($condition != null)
                    $conditions[] = $condition;
            }
        }

        return $conditions;
    }


    private function getConditionFromInput($key , $value)
    {
        switch ($key)
        {
            case "patientName" : return new SimpleConditionItem("Name" , "LIKE" , "%" . $value . "%");
            case "doctorName" : return new SimpleConditionItem("DoctorName" , "LIKE" , "%" . $value . "%");
            case "ageFrom" : return new SimpleConditionItem("Age" , ">=" , $value);
            case "ageTo" : return new SimpleConditionItem("Age" , "<=" , $value);
            case "sd" : return new SimpleConditionItem("SD" , "LIKE" , $value);
            case "address" : return new SimpleConditionItem("Address" , "LIKE" , $value);
            case "work" : return new SimpleConditionItem("Work" , "LIKE" , $value);
            case "status" : return new SimpleConditionItem("Status" , "LIKE" , $value);

            case "dm" : return new SimpleConditionItem("DM" , "LIKE" , $value);
            case "crf" : return new SimpleConditionItem("CRF" , "LIKE" , $value);
            case "diagnose" : return new SimpleConditionItem("Diagnose" , "LIKE" , $value);
            case "diagnoseMethod" : return new SimpleConditionItem("DiagnoseMethod" , "LIKE" , $value);
            case "diseaseType" : return new SimpleConditionItem("DiseaseType" , "LIKE" , $value);
            case "diseaseReason" : return new SimpleConditionItem("DiseaseReason" , "LIKE" , $value);
            case "fibroscan" : return new SimpleConditionItem("Fibroscan" , "LIKE" , $value);
            case "liverBioposy" : return new SimpleConditionItem("LiverBioposy" , "LIKE" , $value);

            case "dateFrom" : return new SimpleConditionItem("RegisterDate" , ">=" , $value);
            case "dateTo" : return new SimpleConditionItem("RegisterDate" , "<=" , $value);

            case "hospital" : return new SimpleConditionItem("HospitalName" , "="  , $value);

            case "firstPCR" : return new SimpleConditionItem("CAST(FirstPCR AS UNSIGNED)" , ">=" , $value);
            case "lastPCR" : return new SimpleConditionItem("CAST(LastPCR AS UNSIGNED)" , "<=" , $value);
            case "treatment" :
                $condition1 = " FirstVisitTreatment1 LIKE ? OR FirstVisitTreatment2 LIKE ?";
                $condition2 = " OR LastVisitTreatment1 LIKE ? OR LastVisitTreatment2 LIKE ? ";
                $condition = "(" . $condition1 . $condition2 . ")";
                $treatment = "%" . $value . "%";
                $values = [$treatment , $treatment , $treatment , $treatment];
                return new SimpleConditionItem($condition , "" , $values);

            default : return null;
        }
    }
}