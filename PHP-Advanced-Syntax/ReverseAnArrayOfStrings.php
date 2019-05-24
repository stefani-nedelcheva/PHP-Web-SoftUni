<?php

$numbers = explode(" ", readline());

for ($a = 0; $a < count($numbers); $a++) {
    echo $numbers[count($numbers) - 1 - $a] . " ";
}
