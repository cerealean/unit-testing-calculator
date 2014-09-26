<?php


namespace Calculator;


use Calculator\Exception\InvalidParameterException;

class Calculator {

    /**
     * @param int ... $integers
     * @throws InvalidParameterException
     * @return int
     */
    public function add(...$integers) {
        $total = 0;

        foreach ($integers as $integer_to_add) {
            if (!is_integer($integer_to_add)) {
                throw new InvalidParameterException("$integer_to_add is not an integer");
            }
            $total += $integer_to_add;
        }

        return $total;
    }

    /**
     * @param int ... $integers
     * @return int
     * @throws InvalidParameterException
     */
    public function subtract(...$integers) {
        $total = 0;

        foreach ($integers as $integer_to_subtract) {
            if (!is_integer($integer_to_subtract)) {
                throw new InvalidParameterException("$integer_to_subtract is not an integer");
            }
            $total -= $integer_to_subtract;
        }

        return $total;
    }

}
 