<?php


namespace Dojo;


use Dojo\Products\Product;

class Buy
{
    private $coins;
    private $product;
    public function __construct(array $coins, Product $product)
    {
        $this->coins = $coins;
        $this->product = $product;
    }

    public function makeTransaction(): object
    {
        $price = $this->product->getPrice();
        foreach ($this->coins as $coin){
           $price -= $coin['price'];
           unset
        }
    }
}