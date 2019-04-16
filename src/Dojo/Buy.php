<?php


namespace Dojo;


use Dojo\Products\Product;
use function foo\func;

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
        $copyOfCoins = $this->coins;
        foreach ($this->coins as $key => $coin){
           $price -= $coin['price'];
           unset($copyOfCoins['key']);
        }
        $result = [
            'getProduct' => function() {return $this->product->getProduct();},
            'getReturnCoins' => function () use ($copyOfCoins){ return $copyOfCoins; }
        ];

        return (object) $result;

    }
}