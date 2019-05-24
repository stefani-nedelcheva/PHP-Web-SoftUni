<?php

$numbers = array_map("intval", explode(" ", readline()));
$check = true;

for ($a = 0; $a < count($numbers); $a++) {
    for ($b = $a + 1; $b < count($numbers); $b++) {
        for ($c = 0; $c < count($numbers); $c++) {
            if ($numbers[$a] + $numbers[$b] == $numbers[$c]) {
                echo "$numbers[$a]" . " + " . "$numbers[$b]" . " == " . $numbers[$c] . PHP_EOL;
                $check = false;
            }
        }
    }
}
if ($check == true) {
    echo "No";
}
