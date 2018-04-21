<?php
use \Matrix\Matrix;

require_once('../autoload.php');

$data = [
    [ 0, 1, 2, 3, 4, 5 ],
    [ 10, 11, 12, 13, 14, 15 ],
];

$matrix = Matrix::create(Matrix::TYPE_NUMBER_ADD, $data);
$output = $matrix->calculate();
print_r($output);