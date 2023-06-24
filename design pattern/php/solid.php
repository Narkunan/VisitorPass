<?php

interface Shape
{
    public function area();
}

class Rectangle implements Shape
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}

class Circle implements Shape
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return pi() * pow($this->radius, 2);
    }
}

class AreaCalculator
{
    public function calculate(Shape $shape)
    {
        return $shape->area();
    }
}

$rectangle = new Rectangle(5, 10);
$circle = new Circle(7);

$areaCalculator = new AreaCalculator();
$rectangleArea = $areaCalculator->calculate($rectangle);
$circleArea = $areaCalculator->calculate($circle);

echo "Rectangle area: " . $rectangleArea . PHP_EOL;
echo "Circle area: " . $circleArea . PHP_EOL;

?>
