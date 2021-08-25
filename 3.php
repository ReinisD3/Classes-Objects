<?php

class FuelGauge
{
    public int $amount;

    function __construct(int $amount)
    {
        $this->amount = $amount;
    }
    function report():string
    {
        return 'Car has: '.$this->amount.'l fuel';
    }
    function addF():bool
    {

        if ($this->amount < 70)
        {
            $this->amount++;
            return true;
        }else {
            echo 'The car is full' .PHP_EOL;
            return false;
        }

    }
    public function decrease():void
    {
        if ($this->amount > 0)
        {
            $this->amount-=1;
        }else
        {
            echo 'The car is out of fuel';
        }
    }
}

class Odometer
{
    public int $odometer = 0;
    public FuelGauge $fuelG;

    function __construct(FuelGauge $fuelG)
    {
        $this->fuelG = $fuelG;

    }
    function report():string
    {
        return 'Car Odometer shows: '.$this->odometer.'km';
    }
    function add()
    {

        if ($this->odometer > 999999)
        {
            $this->odometer = 0;
        }else{
            $this->odometer++;
        }
        if ($this->odometer % 10 === 0)
        {

            $this->fuelG->decrease();
        }
    }

}
//set new instances of classes
$fuelG = new FuelGauge(30);
$odometer = new Odometer($fuelG);
//check reports from classes
echo $odometer->report() .PHP_EOL;
echo $fuelG->report() . PHP_EOL;
//fill up fuel
while($fuelG->addF()){}
//check full fuel tank
echo $fuelG->report() .PHP_EOL;
//incrementing odometer till run out of fuel
while ($fuelG->amount > 0)
{
    $odometer->add();
    echo $odometer->report() .PHP_EOL;
    echo $fuelG->report() . PHP_EOL;
}
