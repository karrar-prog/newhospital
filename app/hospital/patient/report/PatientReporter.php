<?php
namespace App\hospital\patient\report;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-06-09
 * Time: 9:50 PM
 */
class PatientReporter
{
    private $_inputParams;

    /**
     * PatientReporter constructor.
     * @param $_inputParams
     */
    public function __construct($_inputParams)
    {
        $this->_inputParams = $_inputParams;
    }

    public function find()
    {
        $queryGenerator = new QueryGenerator($this->_inputParams);
        $SQL = $queryGenerator->getQueryString();
        $params = $queryGenerator->getParams();

        return DB::select($SQL , $params);
    }

    public function findSimple()
    {
        $queryGenerator = new SimpleFinderQueryGenerator($this->_inputParams);
        $SQL = $queryGenerator->getQueryString();
        $params = $queryGenerator->getParams();

        return DB::select($SQL , $params);
    }

}