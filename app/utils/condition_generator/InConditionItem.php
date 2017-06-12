<?php
namespace App\utils\condition_generator;
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-05-14
 * Time: 8:29 PM
 */
class InConditionItem extends ConditionItem
{
    private $_targetColumn;
    private $_targetTable;
    private $_targetConditionColumn;
    private $_targetConditionOperation;

    /**
     * InConditionItem constructor.
     * @param $_column
     * @param $_value
     * @param $_targetColumn
     * @param $_targetTable
     * @param $_targetConditionColumn
     * @param $_targetConditionOperation
     */
    public function __construct($_column , $_value , $_targetColumn, $_targetTable, $_targetConditionColumn , $_targetConditionOperation)
    {
        parent::__construct($_column , $_value);
        $this->_targetColumn = $_targetColumn;
        $this->_targetTable = $_targetTable;
        $this->_targetConditionColumn = $_targetConditionColumn;
        $this->_targetConditionOperation = $_targetConditionOperation;
    }

    public function generateCondition()
    {
        if (!empty($this->_value))
            return " " . $this->_column . " IN " .
            " (SELECT " . $this->_targetColumn . " FROM " . $this->_targetTable
            . " WHERE " . $this->_targetConditionColumn  . " " . $this->_targetConditionOperation . " ?) ";

        return '';
    }

    public function getValueForQuery()
    {
        if (strcmp("LIKE" , $this->_targetConditionOperation) == 0)
        {
            return "%" . $this->_value . "%";
        }
        return $this->_value;
    }

}