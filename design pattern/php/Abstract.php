<?php
interface Menu
{

public function getMenu($str);

}

interface Price 
{
    public function getPrice();
}

class Snacks implements Menu
{

public function getMenu($str)
{

if($str=="lays")
{
    return new lays();
}
else 
{
    return new Doritos();
}

}

}
class Beverages implements Menu
{
    public  function getMenu($str)
    {
        if($str=="coke")
        {
            return new Coke();
        }
        else 
        {
            return new Sprite();
        }
    }
}
class Lays implements Price
{
    public function getPrice()
    {
        return "the price of lays is $1";
    }
}
class Doritos implements Price
{
    public function getPrice()
    {
        return "the price of doritos is $2";
    }
}

class Coke implements Price
{
    public function getPrice()
    {
        return "the price of coke is $3";
    }
}
class Sprite implements Price
{
    public function getPrice()
    {
        return "the price of sprite is $4";
    }
}

class VendingMachine
 {
    public function selectCatagory($str)
    {
        if($str=="snacks")
            {
                
                return new Snacks();
            }
            else 
                {
                    return new Beverages();
                }
    }
 }
$selectcatagory=new VendingMachine();
$confirm=$selectcatagory->selectCatagory("drinks");
$getcost=$confirm->getMenu("lays");
echo $getcost->getPrice();

?>