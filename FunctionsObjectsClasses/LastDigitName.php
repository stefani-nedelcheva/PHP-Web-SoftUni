<?php

class Number {

    private $number;

    public function __construct(int $number) {

        $this->number = $number;
    }

    public function getNameLastDigit() {

        switch ($this->number % 10) {
            case 0:
                echo "zero";
                break;
            case 1:
                echo "one";
                break;
            case 2:
                echo "two";
                break;
            case 3:
                echo "three";
                break;
            case 4:
                echo "four";
                break;
            case 5:
                echo "five";
                break;
            case 6:
                echo "six";
                break;
            case 7:
                echo "seven";
                break;
            case 8:
                echo "eight";
                break;
            case 9:
                echo "nine";
                break;
            default :
                break;
        }
    }

}

$num = intval(readline());
$number = new Number($num);
$number->getNameLastDigit();
