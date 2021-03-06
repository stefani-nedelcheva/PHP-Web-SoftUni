<?php

$input = array_map("intval", explode(" ", readline()));

$maxCount = 0;
$index = 0;

for ($row = 0; $row < count($input); $row++) {
    $currentCount = 0;
    for ($col = $row; $col < count($input) - 1; $col++) {
        if ($input[$col] < $input[$col + 1]) {
            $currentCount++;
            if ($currentCount > $maxCount) {
                $maxCount = $currentCount;
                $index = $row;
            }
        } else {
            break;
        }
    }
}

for ($a = 0; $a <= $maxCount; $a++) {
    echo $input[$a + $index] . " ";
}