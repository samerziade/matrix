<?php

spl_autoload_register(function($className) {
    $classPath = preg_replace("/\\\/", DIRECTORY_SEPARATOR, $className);
    $srcFileName = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $classPath . '.php';

    if (file_exists($srcFileName)) {
        require_once($srcFileName);
    }

});
