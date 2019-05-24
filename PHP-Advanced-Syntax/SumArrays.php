<?php

$arr1 = explode(" ", readline());
$arr2 = explode(" ", readline());
//$maxArr = max(count($arr1), count($arr2));

if (count($arr1) <= count($arr2)) {
    $maxArr = count($arr2);

    for ($i = 0; $i < count($arr2); $i++) {
        $maxArr = $arr1[$i % (count($arr1))] + $arr2[$i % (count($arr2))];

        if ($i >= count($arr2)) {
            break;
        }
        echo $maxArr . " ";
    }
} else {
    $maxArr = count($arr1);

    for ($i = 0; $i < count($arr1); $i++) {
        $maxArr = $arr1[$i % (count($arr1))] + $arr2[$i % (count($arr2))];

        if ($i >= count($arr1)) {
            break;
        }
        echo $maxArr . " ";
    }
}