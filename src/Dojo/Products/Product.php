<?php


namespace Dojo\Products;


interface Product
{
    public function getProduct(): string ;

    public function getReturnCoins(): array;
}