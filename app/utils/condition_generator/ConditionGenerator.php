<?php
namespace App\utils\condition_generator;
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 2017-05-14
 * Time: 8:02 PM
 */
class ConditionGenerator
{
    private $_items;
    private $_paramsArray = [];
    private $_initialWhere;
    /**
     * ConditionGenerator constructor.
     * @param $items
     */
    public function __construct(ConditionItem...$items)
    {
        $this->_items = $items;
        $this->_initialWhere = "";
    }

    public function setInitialWhere($initialValue = " WHERE ")
    {
        $this->_initialWhere = $initialValue;
    }

    public function generateConditions()
    {
        $where = "";
        if (empty($this->_initialWhere))
            $firstCondition = true;
        else
            $firstCondition = false;

        for($counter = 0 ; $counter < count($this->_items) ; $counter++)
        {
            $generatedCondition = $this->_items[$counter]->generateCondition();

            //put `AND` before adding the condition , because every new condition need `AND` except the first one
            if (!$firstCondition && !empty($generatedCondition))
            {
                $where .= " AND ";
            }

            $where .= $generatedCondition;

            if (!empty($generatedCondition))
            {
                $this->_paramsArray[] = $this->_items[$counter]->getValueForQuery();
                $firstCondition = false;
            }

        }

        return $this->_initialWhere . $where;
    }

    public function getParamsArray()
    {
        return $this->_paramsArray;
    }

}