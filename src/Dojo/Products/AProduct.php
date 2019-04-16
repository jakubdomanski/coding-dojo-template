<?php


namespace Dojo\Products;


class AProduct implements Product
{
    public $price = 0.65;

    protected $name = 'A';

    public function getProduct(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}