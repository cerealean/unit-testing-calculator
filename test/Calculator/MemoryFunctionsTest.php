<?php


namespace Calculator\Test;

use Calculator\MemoryFunctions;
use Phake;

class MemoryFunctionsTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var MemoryFunctions
     */
    protected $memory_functions;

    /**
     * @var \Calculator\Calculator
     */
    protected $calculator;

    /**
     * @var \Calculator\Dao\Memory
     */
    protected $memory_dao;

    public function setUp() {
        parent::setUp();
        $this->calculator = \Phake::mock('\Calculator\Calculator');
        $this->memory_dao = \Phake::mock('\Calculator\Dao\Memory');

        $this->memory_functions = new MemoryFunctions();
        $this->memory_functions->setCalculator($this->calculator);
        $this->memory_functions->setMemoryDao($this->memory_dao);
    }

    public function test_retrieveLatestMemoryEntryShouldCallMemoryDaoRetrieveLatestMemoryEntry() {
        $calculator_id = 1;

        $this->memory_functions->retrieveLatestMemoryEntry($calculator_id);

        Phake::verify($this->memory_dao)
             ->retrieveLatestMemoryEntry($calculator_id);
    }

    public function test_addToMemoryEntryShouldCallMemoryDaoInsertMemoryEntryWithNewEntry() {
        $calculator_id = 1;
        $new_entry     = 4;
        $latest_entry  = 2;
        $number_to_add = 2;
        Phake::when($this->memory_dao)
             ->retrieveLatestMemoryEntry($calculator_id)
             ->thenReturn($latest_entry);
        Phake::when($this->calculator)
             ->add($latest_entry, Phake::anyParameters())
             ->thenReturn($new_entry);

        $this->memory_functions->addToMemoryEntry($calculator_id, $number_to_add);

        Phake::verify($this->memory_dao)
             ->insertMemoryEntry($calculator_id, $new_entry);
    }

    public function test_subtractFromMemoryEntryShouldCallMemoryDaoInsertMemoryEntryWithNewEntry() {
        $calculator_id      = 1;
        $new_entry          = 0;
        $latest_entry       = 2;
        $number_to_subtract = 2;
        Phake::when($this->memory_dao)
             ->retrieveLatestMemoryEntry($calculator_id)
             ->thenReturn($latest_entry);
        Phake::when($this->calculator)
             ->subtract($latest_entry, $number_to_subtract)
             ->thenReturn($new_entry);

        $this->memory_functions->subtractFromMemoryEntry($calculator_id, $number_to_subtract);

        Phake::verify($this->memory_dao)
             ->insertMemoryEntry($calculator_id, $new_entry);
    }

    public function test_setMemoryValueTo0ShouldCallInsertMemoryEntryWith0() {
        $calculator_id = 1;
        $value         = 0;

        $this->memory_functions->setMemoryValueTo0($calculator_id);

        Phake::verify($this->memory_dao)
             ->insertMemoryEntry($calculator_id, $value);
    }

}
 