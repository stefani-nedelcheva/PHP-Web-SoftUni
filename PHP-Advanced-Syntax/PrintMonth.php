<?php

$number = intval(readline());

$array = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

switch ($number) {
    case 1:
        echo $array[0];
        break;
    case 2:
        echo $array[1];
        break;
    case 3:
        echo $array[2];
        break;
    case 4:
        echo $array[3];
        break;
    case 5:
        echo $array[4];
        break;
    case 6:
        echo $array[5];
        break;
    case 7:
        echo $array[6];
        break;
    case 8:
        echo $array[7];
        break;
    case 9:
        echo $array[8];
        break;
    case 10:
        echo $array[9];
        break;
    case 11:
        echo $array[10];
        break;
    case 12:
        echo $array[11];
        break;

    default:
        echo "Invalid Month!";
        break;
}