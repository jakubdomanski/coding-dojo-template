<?php


namespace Dojo\Products;


class AProduct implements Product
{
    public $value = 0.65;

    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getProductName(): string
    {
        return $this->name;
    }


}