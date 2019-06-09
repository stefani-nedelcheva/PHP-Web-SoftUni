<?php

$speed = intval(readline());
$zone = readline();

function getLimit($zone) {
    switch ($zone) {
        case "motorway":
            $speedLimit = 130;
            break;
        case "interstate":
            $speedLimit = 90;
            break;
        case "city":
            $speedLimit = 50;
            break;
        case "residential":
            $speedLimit = 20;
            break;
        default:
            echo "Not a Valid Input";
            break;
    }
    return $speedLimit;
}

$limit = getLimit($zone);

function getInfraction($speed, $limit) {
    $overSpeed = $speed - $limit;
    if ($overSpeed <= 0) {
        return false;
    } else if ($overSpeed > 0 && $overSpeed <= 20) {
        return "speeding";
    } else if ($overSpeed > 20 && $overSpeed <= 40) {
        return "excessive speeding";
    } else {
        return "reckless driving";
    }
}

echo getInfraction($speed, $limit);
