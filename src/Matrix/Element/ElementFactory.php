<?php

namespace Matrix\Element;

class ElementFactory {

    public static function create(string $type, $value): ElementInterface {
        $className = "\Matrix\Element\\" . $type;

        if (class_exists($className)) {
            return new $className($value);
        }

        throw new \InvalidArgumentException('Invalid type: "' . $type . '"');
    }
    
}
