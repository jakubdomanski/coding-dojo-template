<?php


namespace Dojo\Dictionary;


class Coin
{
    const NICKEL = 0.05;
    const DIME = 0.1;
    const QUARTER = 0.25;
    const DOLLAR = 1.0;

    public static function getAllCoinTypes(): array
    {
        return [self::DIME, self::DOLLAR, self::QUARTER, self::NICKEL];
    }

    public static function validValue(float $value)
    {
        return in_array($value, self::getAllCoinTypes());
    }
}