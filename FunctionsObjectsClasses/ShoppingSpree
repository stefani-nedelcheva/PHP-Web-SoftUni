<?php

class Person
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $money;
    /**
     * @var Product[]
     */
    private $products;


    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = [];
    }


    public function getName(): string
    {
        return $this->name;
    }


    private function setName(string $name): void
    {
        if (empty($name)) {
            throw new Exception("Name cannot be empty");
        }
        $this->name = $name;
    }


    public function getMoney(): float
    {
        return $this->money;
    }

    private function setMoney(float $money): void
    {
        if ($money < 0) {
            throw new Exception("Money cannot be negative");
        }
        $this->money = $money;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function buyProduct(Product $product)
    {
        if ($product->getCost() > $this->getMoney()) {
            throw new Exception($this->getName() . " can't afford " . $product->getName() . PHP_EOL);
        }
        $this->money -= $product->getCost();
        $this->products[] = $product;
        echo "{$this->getName()} bought {$product->getName()}\n";
    }

    public function __toString()
    {
        if (count($this->products) === 0) {
            return "{$this->getName()} - Nothing bought\n";
        }
        $output = $this->getName() . " - ";
        $output .= implode(",", array_map(function (Product $product) {
            return $product->getName();
        }, $this->products));
        return $output . PHP_EOL;
    }
}

class Product
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $cost;


    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
    }


    public function getName(): string
    {
        return $this->name;
    }


    private function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getCost(): float
    {
        return $this->cost;
    }

    private function setCost(float $cost): void
    {
        $this->cost = $cost;
    }
}

$personData = preg_split("/[=;]/", readline());

$people = [];

for ($i = 0; $i < count($personData) - 1; $i += 2) {
    try {
        $name = $personData[$i];
        $money = floatval($personData[$i + 1]);
        $people[$name] = new Person($name, $money);
    } catch (Exception $ex) {
        echo $ex->getMessage();
        return;
    }
}

$productsData = preg_split("/[=;]/", readline(), -1, PREG_SPLIT_NO_EMPTY);

$products = [];

for ($i = 0; $i < count($productsData) - 1; $i += 2) {
    $name = $productsData[$i];
    $cost = floatval($productsData[$i + 1]);
    $products[$name] = new Product($name, $cost);
}

$input = readline();

while ($input != "END") {
    $data = explode(" ", $input);
    $personName = $data[0];
    $productName = $data[1];

    try {
        if (array_key_exists($personName, $people) && array_key_exists($productName, $products)) {
            $people[$personName]->buyProduct($products[$productName]);
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    $input = readline();
}

foreach ($people as $person) {
    echo $person;
}
