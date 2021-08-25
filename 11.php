<?php

class Account
{
    public string $owner;
    public float $balance;

    function __construct(string $owner,float $balance)
    {
        $this->owner = $owner;
        $this->balance = $balance;
    }
    public function __toString():string
    {
        return "$this->owner has $$this->balance";
    }
    function withdrawal(float $amount)
    {
        $this->balance -= $amount;
    }
    function deposit(float $amount)
    {
        $this->balance += $amount;
    }
}

function FirstAccount()
{
    $firstAccount = new Account("first account",100);
    $firstAccount->deposit(20);
    echo $firstAccount. PHP_EOL;
}
function moneyTransfer()
{
    $MatAccount = new Account("Matt's account",1000);
    $MyAccount = new Account('My account',0);
    $MatAccount->withdrawal(100);
    $MyAccount->deposit(100);
    echo $MatAccount .PHP_EOL;
    echo $MyAccount .PHP_EOL;
}
function transfer(Account $from, Account $to , int $howMuch)
{
    $from->withdrawal($howMuch);
    $to->deposit($howMuch);
}
function main()
{
    $A = new Account('A',100);
    $B = new Account('B',0);
    $C = new Account('C',0);
    transfer($A,$B,50);
    transfer($B, $C, 25);
}
FirstAccount();
moneyTransfer();
