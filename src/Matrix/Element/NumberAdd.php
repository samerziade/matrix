<?php

namespace Matrix\Element;

class NumberAdd implements ElementInterface {

    private $value;
    
    public function __construct($value) {
        $this->value = $value;
    }
    
    public function calculate(ElementInterface $element): float {
        return $this->value + $element->value;
    }

}
