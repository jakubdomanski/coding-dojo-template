<?php


namespace Dojo;

use Dojo\Dictionary\Coin;

class VendingMachine
{
    private $coins = [];

    /**
     * VendingMachine constructor.
     */
    public function __construct()
    {
    }

    public function insertCoin(float $coin)
    {
        if (!Coin::validValue($coin)) {
            throw new \Exception('no niezle');
        }
        if ($coin > 0) {
            $this->coins[] = $coin;
        }

    }

    public function getInsertedCoinsCount()
    {
        return \count($this->coins);
    }

    public function getAmountOfInsertedCoins()
    {
        return array_sum($this->coins);
    }

    public function withdraw(): float
    {
        $sum = $this->getAmountOfInsertedCoins();
        $this->coins = [];
        return $sum;
    }

    public function buyProduct(string $string): BuyingResult
    {
        $productClass = 'Dojo\Products\\'.$string.'Product';
        $product = new $productClass();

        $transaction = new Buy($this->coins, $product);

        //var_dump($transaction->makeTransaction());
        //die;
        return $transaction->makeTransaction();
    }
}