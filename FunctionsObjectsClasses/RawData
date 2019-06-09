<?php

class Engine {

    private $speed;
    private $power;

    function __construct(int $speed, int $power) {
        $this->setSpeed($speed);
        $this->setPower($power);
    }

    public function getSpeed(): int {
        return $this->speed;
    }

    public function getPower(): int {
        return $this->power;
    }

    private function setSpeed($speed) {
        $this->speed = $speed;
    }

    private function setPower($power) {
        $this->power = $power;
    }

}

class Cargo {

    private $weight;
    private $type;

    function __construct(int $weight, string $type) {
        $this->setWeight($weight);
        $this->setType($type);
    }

    public function getWeight(): int {
        return $this->weight;
    }

    public function getType(): string {
        return $this->type;
    }

    private function setWeight($weight) {
        $this->weight = $weight;
    }

    private function setType($type) {
        $this->type = $type;
    }

}

class Tire {

    private $pressure;
    private $age;

    function __construct(float $pressure, int $age) {
        $this->setPressure($pressure);
        $this->setAge($age);
    }

    public function getPressure(): float {
        return $this->pressure;
    }

    public function getAge(): int {
        return $this->age;
    }

    private function setPressure($pressure) {
        $this->pressure = $pressure;
    }

    private function setAge($age) {
        $this->age = $age;
    }

}

class Car {

    private $model;
    private $cargo;
    private $engine;
    private $tires;

    function __construct(string $model, Engine $engine, Cargo $cargo) {
        $this->model = $model;
        $this->tires = [];
    }

    public function addTire(Tire $tire) {
        $this->tires = $tire;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getEngine() {
        return $this->engine;
    }

    function getTires() {
        return $this->tires;
    }

    function getModel() {
        return $this->model;
    }

}

$n = intval(readline());
$cars = [];

for ($i = 0; $i < $n; $i++) {
    $input = explode(" ", readline());

    list($model, $engineSpeed, $enginePower, $cargoWeight, $cargoType, $tire1Pressure, $tire1Age,
            $tire2Pressure, $tire2Age,
            $tire3Pressure, $tire3Age,
            $tire4Pressure, $tire4Age) = $input;

    $engine = new Engine(intval($engineSpeed), intval($enginePower));
    $cargo = new Cargo(intval($cargoWeight), $cargoType);
    $tire1 = new Tire(floatval($tire1Pressure), intval($tire1Age));
    $tire2 = new Tire(floatval($tire2Pressure), intval($tire2Age));
    $tire3 = new Tire(floatval($tire3Pressure), intval($tire3Age));
    $tire4 = new Tire(floatval($tire4Pressure), intval($tire4Age));
    $car = new Car($model, $engine, $cargo);
    $car->addTire($tire1);
    $car->addTire($tire2);
    $car->addTire($tire3);
    $car->addTire($tire4);

    $cars[] = $car;
}

$command = readline();

switch ($command) {
    case "fragile":
        foreach ($cars as $car) {
            if ($car->getCargo()->getType() == "fragile") {
                foreach ($car->getTires() as $tire) {
                    if ($tire->getPressure() < 1) {
                        echo $car->getModel() . PHP_EOL;
                        break;
                    }
                }
            }
        }
        break;
    case "flamable":
        array_filter($cars, function (Car $car) {
            if ($car->getCargo()->getType() == "flamable" && $car->getEngine()->getPower() > 250) {
                echo $car->getModel() . PHP_EOL;
            }
        });
        break;

    default:
        break;
}
