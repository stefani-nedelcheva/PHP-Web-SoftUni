<?php

class Person {

    public $name;
    public $age;

    function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAge(): int {
        return $this->age;
    }

}

class Family {

    static $people;

    public function addMember(Person $people) {
        self::$people[] = $people;
    }

    public function getOldestMember() {
        $maxAge = 0;
        $arrayKey = 0;
        foreach (self::$people as $key => $value) {
            if ($maxAge < $value->age) {
                $maxAge = $value->age;
                $arrayKey = $key;
            }
        }
        echo self::$people[$arrayKey]->name . " " . self::$people[$arrayKey]->age;
    }

    function getPeople() {

        return $this->people;
    }

}

$n = intval(readline());

for ($i = 0; $i < $n; $i++) {
    $people = explode(" ", readline());
    $name = $people[0];
    $age = $people[1];
    $person = new Person($name, $age);
    $addMember = new Family();
    $addMember->addMember($person);
}

$family = new Family();
$family->getOldestMember();
