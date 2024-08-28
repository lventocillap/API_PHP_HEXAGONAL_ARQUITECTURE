<?php
$array = [
    'a' => 1,
    'b' => 2,
    'c' => 3
];
$mappedArray = array_combine(
    array_keys($array),
    array_map(function($val) { return $val * 2; }, $array)
);

print_r($mappedArray);
