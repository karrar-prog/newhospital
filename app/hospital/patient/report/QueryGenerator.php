<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-06-09
 * Time: 9:53 PM
 */

namespace App\hospital\patient\report;


use App\utils\condition_generator\ConditionGenerator;
use App\utils\condition_generator\SimpleConditionItem;

class QueryGenerator
{
    private $_params;
    protected $_reportConditionGenerator;

    /**
     * QueryGenerator constructor.
     * @param $_params
     */
    public function __construct($_params)
    {
        $this->_params = $_params;
        $this->_reportConditionGenerator = new ReportConditionGenerator($this->_params);
    }

    public function getQueryString()
    {
        return "SELECT ID , Name , Gender , Address , HospitalName , pvr.* FROM patient , pvr " . $this->_reportConditionGenerator->generate("WHERE pvr.Patient_ID = patient.ID");
    }

    public function getParams()
    {
        return $this->_reportConditionGenerator->getParams();
    }

}