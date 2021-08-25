<?php

class SavingsAccount
{

    public float $interestRate;
    public float $balance;

    function __construct(float $startingBalance)
    {
        $this->balance = $startingBalance;
    }
    function withdraw(float $amount)
    {
        $this->balance -= $amount;
    }
    function deposit(float $amount)
    {
        $this->balance += $amount;
    }
    function monthlyInterest():float
    {
        $monthlyInterest = round($this->balance*$this->interestRate/12,2);
        $this->balance += $monthlyInterest;
        return $monthlyInterest;
    }
    function setInterest(float $rate)
    {
        $this->interestRate = $rate;
    }
}

function Test()
{
    $balance = readline("How much money is in the account?: ").PHP_EOL;
    $balance = (float) $balance;
    $Account = new SavingsAccount($balance);
    $interestRate = readline("Enter the annual interest rate: ").PHP_EOL;
    $interestRate = (float) $interestRate;
    $Account->setInterest($interestRate);
    $monthsOpenedAccount = readline("How long has the account been opened?").PHP_EOL;

    $totalWithdrawn = 0;
    $totalDeposit = 0;
    $interestEarned = 0;

    foreach (range(1,$monthsOpenedAccount) as $month)
    {
        $deposit = readline("Enter amount deposited for month:$month: ").PHP_EOL;
        $deposit = (float) $deposit;
        $totalDeposit += $deposit;
        $Account->deposit($deposit);
        $withdraw = readline("Enter amount withdrawn for $month: ").PHP_EOL;
        $withdraw = (float) $withdraw;
        $totalWithdrawn += $withdraw;
        $Account->withdraw($withdraw);
        $interestEarned += $Account->monthlyInterest();
    }
    function formatNumber(float $number): string
    {
       return number_format($number, 2, '.', ' ');
    }
    echo 'Total deposited : $'.formatNumber($totalDeposit) . PHP_EOL;
    echo "Total withdrawn : $" .formatNumber($totalWithdrawn) . PHP_EOL;
    echo "Interest earned : $" .formatNumber($interestEarned) . PHP_EOL;
    echo "Ending balance  : $" . formatNumber($Account->balance) .PHP_EOL;

}
Test();