<?php

$numbers = explode(" ", readline());

for ($a = 0; $a < count($numbers); $a++) {
    echo $numbers[count($numbers) - 1 - $a] . " ";
}

//for ($i = count($numbers) - 1; $i >= 0; $i--) {
//    echo $numbers[$i] . " ";
//}

//echo implode(" ", array_reverse(explode(" ", readline())));