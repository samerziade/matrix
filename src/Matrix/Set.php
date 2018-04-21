<?php

namespace Matrix;

use \Matrix\Element\ElementInterface;

class Set {
    
    /**
     * @var ElementInterface
     */
    private $firstElement;

    /**
     * @var ElementInterface[]
     */
    private $elements = [];
    
    public function addElement(ElementInterface $element): void {
        if ($this->firstElement === null) {
            $this->firstElement = $element;
        }

        $this->elements[] = $element;
    }

    public function calculate(): array {
        $output = [];

        foreach ($this->elements as $element) {
            $output[] = $this->firstElement->calculate($element);
        }

        return $output;
    }
}
