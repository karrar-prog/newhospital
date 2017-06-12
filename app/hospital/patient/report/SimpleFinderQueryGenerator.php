<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-06-12
 * Time: 2:47 AM
 */

namespace App\hospital\patient\report;


class SimpleFinderQueryGenerator extends QueryGenerator
{
    public function getQueryString()
    {
        if (count($this->getParams()) > 0)
            return "SELECT ID , Name , Address , HospitalName , Age , Work , Phone , Gender , RegisterDate FROM patient WHERE " . $this->_reportConditionGenerator->generate();
        else
            return "SELECT ID , Name , Address , HospitalName , Age , Work , Phone , Gender , RegisterDate FROM patient " . $this->_reportConditionGenerator->generate();
    }

}