<?php

$input = strtolower(readline());

$alphabet = "abcdefghijklmnopqrstuvwxyz";

for ($a = 0; $a < strlen($input); $a++) {
    echo $input[$a] . " -> " . strpos($alphabet, $input[$a]) . PHP_EOL;
}