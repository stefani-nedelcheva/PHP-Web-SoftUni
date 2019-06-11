<?php

$number = intval(readline());
$commands = explode(", ", readline());

$calculate = function ($command, $number) {
    switch ($command) {
        case "chop":
            $number /= 2;
            break;
        case "dice":
            $number = sqrt($number);
            break;
        case "spice":
            $number++;
            break;
        case "bake":
            $number *= 3;
            break;
        case "fillet":
            $number -= $number * 0.2;
            break;
    }
    return $number;
};

foreach ($commands as $command) {
    $number = $calculate($command, $number);
    echo $number . PHP_EOL;
}
