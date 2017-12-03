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
        $generatedCondition = $this->_reportConditionGenerator->generate();
        if (count($this->getParams()) > 0)
            return "SELECT ID , Name , Address  , Age , Work , Phone , Gender , RegisterDate FROM patient WHERE " . $generatedCondition;
        else
            return "SELECT ID , Name , Address  , Age , Work , Phone , Gender , RegisterDate FROM patient " . $generatedCondition;
    }

}