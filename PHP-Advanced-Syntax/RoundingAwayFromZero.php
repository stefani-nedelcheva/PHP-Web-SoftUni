<?php

$numbers = array_map("floatval", explode(" ", readline()));

for ($i = 0; $i < count($numbers); $i++) {
    $current = $numbers[$i];

    echo $current . " => " . round($current, 1, PHP_ROUND_HALF_UP) . PHP_EOL;
}