<?php

class Person {

    private $name;
    private $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    function getName(): string {
        return $this->name;
    }

    function getAge(): int {
        return $this->age;
    }

    public function printPerson() {
        return "{$this->getName()} - {$this->getAge()}\n";
    }

}

$n = intval(readline());

$persons = [];

while ($n-- > 0) {
    $input = explode(" ", readline());

    $name = $input[0];
    $age = intval($input[1]);

    $persons[] = new Person($name, $age);
}

$filteredPeople = array_filter($persons, function(Person $person) {
    return $person->getAge() > 30;
});

usort($filteredPeople, function(Person $p1, Person $p2) {
    return $p1->getName() <=> $p2->getName();
});

foreach ($filteredPeople as $person) {
    echo $person->printPerson();
}
