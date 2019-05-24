<?php

$numbers = readline();
$countNumbers = [];

for ($a = 0; $a < count($numbers); $a++) {
    $current = $numbers[$a] . "";
    if (!array_key_exists($current, $countNumbers)) {
        $countNumbers[$current] = 1;
    } else {
        $countNumbers[$current] ++;
    }
}
echo ("$current" .  " -> " . "$countNumbers");
