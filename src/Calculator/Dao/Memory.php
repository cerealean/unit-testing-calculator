<?php


namespace Calculator\Dao;

/**
 * Class CalculatorLog
 *
 * @package Calculator\Dao
 */
class Memory {

    /**
     * @var \PDO
     */
    protected $dbm;

    /**
     * @param \PDO $dbm
     */
    public function setDbm(\PDO $dbm) {
        $this->dbm = $dbm;
    }

    /**
     * @param int $calculator_id
     * @return int
     */
    public function retrieveLatestMemoryEntry($calculator_id) {
        $query     = 'SELECT entry
                    FROM Memory
                    WHERE calculator_id = :calculator_id
                    ORDER BY date_added DESC
                    LIMIT 1';
        $statement = $this->dbm->prepare($query);
        $statement->execute(['calculator_id' => $calculator_id]);
        $result = $statement->fetchColumn();

        return $result;
    }

    /**
     * @param int $calculator_id
     * @param int $entry
     */
    public function insertMemoryEntry($calculator_id, $entry) {
        $query     = 'INSERT INTO Memory (calculator_id, entry) VALUES (:calculator_id, :entry)';
        $statement = $this->dbm->prepare($query);
        $statement->execute([
                                'calculator_id' => $calculator_id,
                                'entry'         => $entry
                            ]);
    }

}
 