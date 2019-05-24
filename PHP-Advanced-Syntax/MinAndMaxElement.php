<?php

$input = explode(", ", readline());

$rowSize = intval([$input[0]]);
$colSize = intval([$input[1]]);

$matrix = [];

for ($row = 0; $row < $rowSize; $row++) {
    $matrix[$row] = array_map("intval", explode(", ", readline()));
}

$min = PHP_INT_MAX;
$max = PHP_INT_MIN;

for ($row = 0; $row < count($matrix); $row++) {
    for ($col = 0; $col < count($matrix[$row]); $col++) {
        $element = $matrix[$row][$col];

        if ($element < $min) {
            $min = $element;
        }
        if ($element > $max) {
            $max = $element;
        }
    }
}

echo "Min: $min" . PHP_EOL;
echo "Max: $max";   
