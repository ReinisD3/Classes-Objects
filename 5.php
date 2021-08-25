<?php
//
//Create a class called Date that includes: three pieces of information as instance variables — a month, a day and a year.
//
//Your class should have a constructor that initializes the three instance variables and assumes that the values provided are correct. Provide a set and a get for each instance variable.
//
//Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.
//
//Write a test application named DateTest that demonstrates class Date capabilities.

class Date
{
    private int $month;
    private int $day;
    private int $year;

    function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }
    function set_month():void
    {
        $this->month = (int)readline('Enter new month : ');
    }
    function set_day():void
    {
        $this->day = (int)readline('Enter new day : ');
    }
    function set_year():void
    {
        $this->year = (int)readline('Enter new year : ');
    }
    function get_month():int
    {
        return $this->month;
    }
    function get_day():int
    {
        return $this->day;
    }
    function get_year():int
    {
        return $this->year;
    }
    function DisplayDate():string
    {
        return $this->month.'/'.$this->day.'/'.$this->year;
    }
}



// function to show Date class capabilities;
function dateTest()
{
    echo "Initializing Date class object with 3 instance variables and using class get methods to check them".PHP_EOL;
    $date = new Date(05,24,1990);
    echo $date->DisplayDate().PHP_EOL;
    echo 'Setting new Date object values and getting them to check'.PHP_EOL;
    $date->set_month();
    echo $date->get_month().PHP_EOL;
    $date->set_day();
    echo $date->get_day().PHP_EOL;
    $date->set_year();
    echo $date->get_year().PHP_EOL;
    echo $date->DisplayDate().PHP_EOL;

}
dateTest();