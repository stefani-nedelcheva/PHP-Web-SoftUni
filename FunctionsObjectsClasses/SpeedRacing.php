<?php

class Car {

    private $model;
    private $fuelAmount;
    private $fuelCostPerKm;
    private $distance;

    function __construct($model, $fuelAmount, $fuelCostPerKm) {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCostPerKm = $fuelCostPerKm;
        $this->distance = 0;
    }

    public function drive(float $distanceTraveled) {
        $fuelNeeded = $this->fuelCostPerKm * $distanceTraveled;

        if ($fuelNeeded <= $this->fuelAmount) {
            $this->fuelAmount -= $fuelNeeded;
            $this->distance += $distanceTraveled;
            $this->fuelAmount = number_format($this->fuelAmount, 2);
        } else {
            echo "Insufficient fuel for the drive\n";
        }
    }

    public function __toString() {
        $fuelAmountResult = number_format($this->fuelAmount, 2, '.', "");
        return "{$this->model} {$fuelAmountResult} {$this->distance}";
    }

}

$n = intval(readline());

$cars = [];

while ($n-- > 0) {
    $data = explode(" ", readline());

    $model = $data[0];
    $fuelAmount = floatval($data[1]);
    $fuelCostPerKm = floatval($data[2]);

    $car = new Car($model, $fuelAmount, $fuelCostPerKm);

    if (!array_key_exists($model, $cars)) {
        $cars[$model] = $car;
    }
}
while (true) {
    $input = explode(" ", readline());

    if ($input[0] == "END") {
        break;
    }
    $model = $input[1];
    $amountOfKm = intval($input[2]);

    $cars[$model]->drive($amountOfKm);

    foreach ($cars as $car) {
        echo $cars;
    }
}
