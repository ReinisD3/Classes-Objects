<?php
$surveyed = 12467;
$purchasedEnergyDrinks = 0.14;
$prefer_citrus_drinks = 0.64;

function totalEnergyDrinkers(int $numberSurveyed, float $purchasedEnergyDrinks):int
{
    return round($numberSurveyed*$purchasedEnergyDrinks);
}

function prefersCitrus(int $totalDrinkers, float $percent_prefer_citrus):int
{
    return round($totalDrinkers*$percent_prefer_citrus);
}
$energyDrinkers = totalEnergyDrinkers($surveyed,$purchasedEnergyDrinks);
$citrusDrinkers = prefersCitrus($energyDrinkers,$prefer_citrus_drinks);


echo "Total number of people surveyed " . $surveyed.PHP_EOL;
echo "Approximately " . $energyDrinkers . " bought at least one energy drink".PHP_EOL;
echo $citrusDrinkers . " of those " . "prefer citrus flavored energy drinks.".PHP_EOL;
