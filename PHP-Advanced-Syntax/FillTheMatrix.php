<?php

$input = explode(", ", readline());

$sizeMatrix = intval($input[0]);
$pattern = strtolower($input[1]);

$count = 1;
$matrix = [];

switch ($pattern) {
    case "a":

        for ($row = 0; $row < $sizeMatrix; $row++) {
            for ($col = 0; $col < $sizeMatrix; $col++) {
                $matrix[$col][$row] = $count++;
            }
        }
        printMatrix($matrix);
        break;
    case "b":
        for ($row = 0; $row < $sizeMatrix; $row++) {
            for ($col = 0; $col < $sizeMatrix; $col++) {
                if ($row % 2 == 0) {
                    $matrix[$col][$row] = $count++;
                } else {
                    $matrix[$sizeMatrix - 1 - $col][$row] = $count++;
                }
            }
        }
        printMatrix($matrix);
        break;
    case "c":
        for ($row = 0; $row < $sizeMatrix; $row++) {
            for ($col = 0; $col < $sizeMatrix; $col++) {
                $matrix[$row][$col] = $count++;
            }
        }
        printMatrix($matrix);

        break;
}

function printMatrix($matrix) {
    for ($row = 0; $row < count($matrix); $row++) {
        for ($col = 0; $col < count($matrix[$row]); $col++) {
            echo $matrix[$row][$col] . " ";
        }
        echo PHP_EOL;
    }
}
