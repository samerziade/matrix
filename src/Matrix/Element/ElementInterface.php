<?php

namespace Matrix\Element;

interface ElementInterface {

    public function calculate(ElementInterface $element): float;
    
}
