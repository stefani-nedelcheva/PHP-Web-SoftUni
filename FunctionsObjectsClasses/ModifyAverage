<?php

$number = array_map("intval", str_split(readline()));

$check = function ($number) {
    return array_sum($number) / count($number);
};

while (true) {
    $avg = $check($number);

    if ($avg > 5) {
        break;
    }

    $number[] = 9;
}

echo implode("", $number);
