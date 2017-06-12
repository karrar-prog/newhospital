<?php
namespace App\utils\condition_generator;
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-05-14
 * Time: 8:28 PM
 */
class SimpleConditionItem extends ConditionItem
{
    private $_operation;

    /**
     * ConditionItem constructor.
     * @param $_column
     * @param $_operation
     * @param $_value
     * @internal param null $_targetColumn
     * @internal param null $_targetTable
     * @internal param null $_targetConditionColumn
     */
    public function __construct($_column, $_operation, $_value)
    {
        parent::__construct($_column , $_value);
        $this->_operation = $_operation;
    }

    public function generateCondition()
    {
        if (!empty($this->_value))
            return " " . $this->_column . " " . $this->_operation . " ? ";
        return '';
    }

    public function getValueForQuery()
    {
//        if (strcmp("LIKE" , $this->_operation) == 0)
//        {
//            return "%" . $this->_value . "%";
//        }
        return $this->_value;
    }

}