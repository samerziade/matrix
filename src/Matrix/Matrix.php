<?php

namespace Matrix;

use \Matrix\Element\ElementFactory;

class Matrix {

    const TYPE_NUMBER_ADD            = 'NumberAdd';
    const TYPE_COORDINATES_HAVERSINE = 'CoordinatesHaversine';

    private $sets = [];

    public static function create(string $type, array $data): Matrix {
        $matrix = new Matrix();

        foreach ($data as $row) {
            $set = new Set();
            $matrix->addSet($set);

            foreach ($row as $value) {
                $element = ElementFactory::create($type, $value);
                $set->addElement($element);
            }
        }

        return $matrix;
    }

    public function addSet(Set $set): void {
        $this->sets[] = $set;
    }

    public function calculate(): array {
        $output = [];

        foreach ($this->sets as $set) {
            $output[] = $set->calculate();
        }

        return $output;
    }

}
