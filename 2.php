<?php

class Point
{
    public int $x;
    public int $y;

    function __construct(int $x,int $y)
    {
        $this->x=$x;
        $this->y=$y;
    }

}


function swap_points(Point $p1,Point $p2):void
{
    $savePoint = new Point($p1->x,$p1->y);
    $p1->x = $p2->x;
    $p1->y = $p2->y;

    $p2->x = $savePoint->x;
    $p2->y = $savePoint->y;

}

echo "Welcome to point x/y swapper.".PHP_EOL;
$x1 = readline("Please enter point1 x.coordinate:") . PHP_EOL;
$y1 = readline("Please enter point1 y.coordinate:") . PHP_EOL;
$p1 = new Point((int)trim($x1), (int)trim($y1));
echo "P1 = ({$p1->x}, {$p1->y}) " . PHP_EOL;
$x2 = readline("Please enter point2 x.coordinate:").PHP_EOL;
$y2 = readline("Please enter point2 y.coordinate:").PHP_EOL;
$p2 = new Point((int)trim($x2), (int)trim($y2));
echo "P2 = ($p2->x, $p2->y)" . PHP_EOL;

echo "SWAPPING THE POINTS ->->->-> :".PHP_EOL;

swap_points($p1,$p2);
echo "P1 = ({$p1->x}, {$p1->y})".PHP_EOL;
echo "P2 = ({$p2->x}, {$p2->y})".PHP_EOL;