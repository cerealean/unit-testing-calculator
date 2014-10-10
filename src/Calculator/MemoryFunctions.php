<?php


namespace Calculator;


use Calculator\Dao\Memory as MemoryDao;

/**
 * Class MemoryFunctions
 *
 * @package Calculator
 */
class MemoryFunctions {

    /**
     * @var MemoryDao
     */
    protected $memory_dao;

    /**
     * @var Calculator
     */
    protected $calculator;

    /**
     * @param int $calculator_id
     * @param int ... $values
     */
    public function addToMemoryEntry($calculator_id, ...$values) {
        $latest_memory_value = $this->retrieveLatestMemoryEntry($calculator_id);
        $new_value           = $this->calculator->add($latest_memory_value, $values);
        $this->memory_dao->insertMemoryEntry($calculator_id, $new_value);
    }

    /**
     * @param int $calculator_id
     * @return int
     */
    public function retrieveLatestMemoryEntry($calculator_id) {
        return $this->memory_dao->retrieveLatestMemoryEntry($calculator_id);
    }

    /**
     * @param int $calculator_id
     * @param int ... $values
     */
    public function subtractFromMemoryEntry($calculator_id, ...$values) {
        $latest_memory_value = $this->retrieveLatestMemoryEntry($calculator_id);
        $new_value           = $this->calculator->subtract($latest_memory_value, $values);
        $this->memory_dao->insertMemoryEntry($calculator_id, $new_value);
    }

    /**
     * @param int $calculator_id
     */
    public function setMemoryValueTo0($calculator_id) {
        $this->memory_dao->insertMemoryEntry($calculator_id, 0);
    }

    //region setters
    /**
     * @param MemoryDao $memory_dao
     */
    public function setMemoryDao(MemoryDao $memory_dao) {
        $this->memory_dao = $memory_dao;
    }

    /**
     * @param Calculator $calculator
     */
    public function setCalculator(Calculator $calculator) {
        $this->calculator = $calculator;
    }
    //endregion

}
 