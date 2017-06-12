<?php

namespace App\utils\condition_generator;

/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-05-14
 * Time: 8:05 PM
 */
abstract class ConditionItem
{

    protected $_column;
    protected $_value;

    /**
     * ConditionItem constructor.
     * @param $_column
     * @param $_value
     */
    public function __construct($_column, $_value)
    {
        $this->_column = $_column;
        $this->_value = $_value;
    }

    public abstract function generateCondition();

    public function getValue()
    {
        return $this->_value;
    }

    public function haveCondition()
    {
        return !empty($this->_value);
    }

    public abstract function getValueForQuery();

}