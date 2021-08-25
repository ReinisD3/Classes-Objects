<?php

class BankAccount
{
    public string $name;
    public float $balance;

    function __construct(string $name,float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    function show_user_name_and_balance():void
    {
        $formatBalance = number_format($this->balance,2,);
        if ($this->balance < 0)
        {
            $formatBalance = abs($formatBalance);
            $formatBalance = number_format($this->balance,2,);
            echo "$this->name, -$$formatBalance " . PHP_EOL;
        }
        else
        {
            echo "$this->name, $$formatBalance " . PHP_EOL;
        }
            }

}

$ben = new BankAccount('Benson',-17.5);
$ben->show_user_name_and_balance();

$ben = new BankAccount('Benson',17.5);
$ben->show_user_name_and_balance();
