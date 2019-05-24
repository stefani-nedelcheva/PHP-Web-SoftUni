<?php

$n = intval(readline());

for ($a = 0; $a < $n; $a++) {
    $array[] = intval(readline());
}

for ($a = $n - 1; $a >= 0; $a--) {
    echo $array[$a] . ' ';
}