<?php


namespace Dojo;


class BuyingResult
{
    private $product;

    private $coins;

    public function __construct($product, $coins)
    {
        $this->product = $product;
        $this->coins = $coins;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getReturnCoins()
    {
        return $this->coins;
    }


}