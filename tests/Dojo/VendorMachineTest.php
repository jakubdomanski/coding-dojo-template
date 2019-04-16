<?php

namespace Tests;

use Dojo\Dictionary\Coin;
use Dojo\VendingMachine;

class VendorMachineTest extends \PHPUnit\Framework\TestCase
{

    public function testThatYouCanInsertCoins()
    {
        $vendingMachine = new \Dojo\VendingMachine();

        $vendingMachine->insertCoin(0.25);

        $this->assertEquals(1, $vendingMachine->getInsertedCoinsCount());
    }

    public function testThatYouWillGetAmountOfInsertedCoin()
    {
        $vendingMachine = new \Dojo\VendingMachine();

        $vendingMachine->insertCoin(1);

        $this->assertEquals(1, $vendingMachine->getAmountOfInsertedCoins());
    }

    /**
     * @expectedException \Exception
     */
    public function testThatYouCannotInsertAmountBelowZero()
    {
        $vendingMachine = new \Dojo\VendingMachine();

        $vendingMachine->insertCoin(-1);
        $this->assertEquals(0, $vendingMachine->getAmountOfInsertedCoins());
    }

    /**
     * @expectedException  \Exception
     */
    public function testThatYouCanInsertMultipleCoins()
    {
        $vendingMachine = new \Dojo\VendingMachine();

        $vendingMachine->insertCoin(-1);
        $vendingMachine->insertCoin(0.25);
        $vendingMachine->insertCoin(0.5);
        $this->assertEquals(2, $vendingMachine->getInsertedCoinsCount());
        $this->assertEquals(0.75, $vendingMachine->getAmountOfInsertedCoins());
    }

    /**
     * @expectedException \Exception
     */
    public function testThatYouCannotInsertInvalidCoins()
    {
        $vendingMachine = new \Dojo\VendingMachine();

        $vendingMachine->insertCoin(0.33);
    }

    public function testThatYouCanWithdraw()
    {
        $vendingMachine = new \Dojo\VendingMachine();

        $vendingMachine->insertCoin(0.25);
        $vendingMachine->insertCoin(0.25);
        $vendingMachine->insertCoin(0.25);
        $vendingMachine->insertCoin(0.25);
        $vendingMachine->insertCoin(0.25);
        $vendingMachine->insertCoin(0.25);
        $vendingMachine->insertCoin(0.25);
        $vendingMachine->insertCoin(0.25);

        $this->assertEquals($vendingMachine->getAmountOfInsertedCoins(), $vendingMachine->withdraw());

        $this->assertEquals(0, $vendingMachine->getInsertedCoinsCount());
        $this->assertEquals(0, $vendingMachine->getAmountOfInsertedCoins());
    }

    public function testBuyingProductAForExactAmountOfMoney()
    {
        $productAValue = 0.65;

        $vendingMachine = new VendingMachine();
        $vendingMachine->insertCoin(Coin::QUARTER);
        $vendingMachine->insertCoin(Coin::QUARTER);
        $vendingMachine->insertCoin(Coin::DIME);
        $vendingMachine->insertCoin(Coin::NICKEL);

        $buingResult = $vendingMachine->buyProduct('A');
        $this->assertEquals('A', $buingResult->getProductName());
        $this->assertEmpty($buingResult->getReturnCoins());
    }

}
