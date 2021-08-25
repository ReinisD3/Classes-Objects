<?php

class Product
{
    public float $price;
    public int $amount;
    public string $name;

    function __construct(string $name,float $price,int $amount)
    {
        $this->name = $name;
        $this->price=$price;
        $this->amount=$amount;
    }
    function printProduct():string
    {
        return $this->name.' | price('.$this->price.'euro) | amount: '.$this->amount.PHP_EOL;
    }
    function addItems(int $amount):void
    {
        $this->amount += $amount;
    }
    function changePrice(float $newPrice):void
    {
        $this->price = $newPrice;
    }
}

$mouse = new Product("Logitech mouse",70,14);
$phone = new Product("iPhone 5s",999.99,3);
$item = new Product("Epson EB-U05",440.46,1);

$products = [$mouse,$phone,$item,];
$product_count = count($products);

function display_products(array $products):void
{
    echo 'PRODUCT LIST:'.PHP_EOL;
    foreach ($products as $key=>$product)
    {
        echo '('.($key+1).') '.$product->printProduct();
    }
    $count = count($products);
    echo PHP_EOL . "PRODUCT MANAGER".PHP_EOL."Choose product to make changes 1 - {$count} :" . PHP_EOL;
    echo "Enter 'done' to exit".PHP_EOL;
}

function chooseProduct(array $products):int
{
    while(true)
    {
        $input = readline('<');
        if(array_key_exists((int)$input-1,$products))
        {
            return (int)$input;
        }
        elseif ($input == 'done')
        {
            return 0;
        }
        else{
            echo 'Invalid choice, try again'.PHP_EOL;
        }
    }
}
function chooseOperation():int
{
    while(true)
    {
        $input = readline('<');
        if((int)$input === 1 || (int)$input == 2 || $input =='done')
        {
            return (int)$input;
        }
        else{
            echo 'Invalid operation, choose again'.PHP_EOL;
        }
    }
}
$manager_on = true;
while($manager_on) {

    display_products($products);
    $input = chooseProduct($products) . PHP_EOL;
    if ($input == 0){
        $manager_on = false;
    }
    $input = (int)$input -1;

    $operation_on = $manager_on;
    while ($operation_on) {
        echo PHP_EOL.$products[$input]->printProduct().PHP_EOL;
        echo "Press 1 to change {$products[$input]->name} price " . PHP_EOL;
        echo "Press 2 to change {$products[$input]->name} amount " . PHP_EOL;
        echo "Enter 'done' to go back".PHP_EOL;
        $operation = chooseOperation();
        if ($operation == 1) {
            $price_change = readline('Enter new price:') . PHP_EOL;
            $products[$input]->changePrice((float) $price_change);

        } elseif ($operation == 2) {
            $amount_change = readline('Enter item amount to add:') . PHP_EOL;
            $products[$input]->addItems((int) $amount_change);

        } elseif ($operation == 0) {
            $operation_on = false;
        }
    }
}



//$mouse->addItems(6);
//$mouse->printProduct();
//$mouse->changePrice(50);
//$mouse->print_product();