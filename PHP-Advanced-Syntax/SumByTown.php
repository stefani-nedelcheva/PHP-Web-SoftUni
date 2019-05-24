<?php

$arr = [];

while (1) {
    $city = trim(readline());
    if ($city == '') {
        break;
    }
    $income = intval(readline());
    if (array_key_exists($city, $arr)) {
        $arr[$city] += $income;
    } else {
        $arr[$city] = $income;
    }
}
print_r($arr);
 