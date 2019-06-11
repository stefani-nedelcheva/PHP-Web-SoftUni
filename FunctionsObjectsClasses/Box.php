<?php

class Box
{
    /**
     * @var float
     */
    private $length;
    /**
     * @var float
     */
    private $width;
    /**
     * @var float
     */
    private $height;


    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    public function validateData(float $parameter, string $type)
    {
        if ($parameter <= 0) {
            throw new Exception("{$type} cannot be zero or negative.");
        }
    }

    public function getLength(): float
    {
        return $this->length;
    }


    private function setLength(float $length): void
    {
        $this->validateData($length, "Length");
        $this->length = $length;
    }


    public function getWidth(): float
    {
        return $this->width;
    }


    private function setWidth(float $width): void
    {
        $this->validateData($width, "Width");
        $this->width = $width;
    }


    public function getHeight(): float
    {
        return $this->height;
    }

    private function setHeight(float $height): void
    {
        $this->validateData($height, "Height");
        $this->height = $height;
    }

    private function getVolume(): float
    {
        $result = $this->getLength() * $this->getWidth() * $this->getHeight();
        return $result;
    }

    private function getLateralSurfaceArea()
    {
        $result = (2 * $this->getLength() * $this->getHeight()) + (2 * $this->getWidth() * $this->getHeight());
        return $result;
    }

    private function getSurfaceArea()
    {
        $result = (2 * $this->getLength() * $this->getWidth()) + (2 * $this->getLength() * $this->getHeight()) + (2 * $this->getWidth() * $this->getHeight());
        return $result;
    }

    public function __toString()
    {
        $volume = number_format($this->getVolume(), 2, '.', '');
        $lateralSurfaceArea = number_format($this->getLateralSurfaceArea(), 2, '.', '');
        $surfaceArea = number_format($this->getSurfaceArea(), 2, '.', '');
        return "Surface Area - {$surfaceArea}\nLateral Surface Area - {$lateralSurfaceArea}\nVolume - {$volume}\n";
    }
}

$length = floatval(readline());
$width = floatval(readline());
$height = floatval(readline());

try {
    $box = new Box($length, $width, $height);
    echo $box;
} catch (Exception $e) {
    echo $e->getMessage();
}
