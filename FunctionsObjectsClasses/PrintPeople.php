<?php

class Person {

    public $name;
    public $age;
    public $occupation;

    public function __construct(string $name, int $age, string $occupation) {
        $this->setName($name);
        $this->setAge($age);
        $this->setOccupation($occupation);
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setOccupation($occupation) {
        $this->occupation = $occupation;
    }

}

$data = [];

while (true) {

    $obj1 = readline();
    if ($obj1 == "END") {
        break;
    }
    $obj = explode(" ", $obj1);
    $object = new Person($obj[0], $obj[1], $obj[2]);
    $data[$object->age][] = $object;
}


foreach ($data as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $key => $value1) {
            echo $value1->name . " - age: " . $value1->age . ", " . "occupation: " . $value1->occupation . PHP_EOL;
        }
    }
}
