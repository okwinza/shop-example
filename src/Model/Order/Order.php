<?php

namespace App\Model\Order;

use App\Model\Catalog\Product;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Money\Currency;
use Money\Money;

class Order
{
    private $id;
    private $lines;

    public function __construct()
    {
        $this->lines = new ArrayCollection();
    }

    public function add(Product $product, int $quantity)
    {
        $this->lines->add(new OrderLine($product, $quantity));
    }

    public function price(): Money
    {
        $zero = new Money(0, new Currency('USD'));
        $totalPrice = array_reduce($this->lines->toArray(), function(Money $total, OrderLine $line) {

            return $total->add($line->price());
        }, $zero);

        return $this->applyDiscounts($totalPrice);
    }

    private function applyDiscounts(Money $price): Money
    {
        if (!$this->hasLinesWithMoreThanOneItem()) {
            return $price;
        }

        return $price->multiply(0.9);
    }

    private function hasLinesWithMoreThanOneItem()
    {
        $count = $this->lines->matching(Criteria::create()->where(Criteria::expr()->gt('quantity', 1)))->count();

        return 0 !== $count;
    }
}