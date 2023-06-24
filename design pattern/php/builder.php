<?php

class Laptop
{
 
 public $Laptop_Build;
 public $Laptop_Display;
 public $Laptop_Backlit;
 public $Laptop_Ram;
 public $Laptop_Storage;
public function setLaptopBuild($build)
{
$this->Laptop_Build=$build;
return $this->Laptop_Build;
}
public function setLaptopDisplay($display)
{
$this->Laptop_Display=$display;
return $this->Laptop_Display;
}
public function setLaptopBacklit($backlit)
{
$this->Laptop_Backlit=$backlit;
return $this->Laptop_Backlit;
}
public function setLaptopRam($ram)
{
$this->Laptop_Ram=$ram;
return $this->Laptop_Ram;
}
public function setLaptopStorage($storage)
{
$this->Laptop_Storage=$storage;
return $this->Laptop_Storage;
}
public function getLaptop()
{
return "laptop build $this->Laptop_Build  Laptop display $this->Laptop_Display  laptop backlit $this->Laptop_Backlit  laptop ram $this->Laptop_Ram  laptop storage $this->Laptop_Storage";
}

}
$obj=new Laptop();
$obj->setLaptopBuild("plastic");
$obj->setLaptopDisplay("Led");
$obj->setLaptopBacklit("true");
$obj->setLaptopRam("8gb");
$obj->setLaptopStorage("256gb ssd");
echo $obj->getLaptop();
?>