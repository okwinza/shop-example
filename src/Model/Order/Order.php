<?php

namespace App\Model\Order;

use App\Model\Catalog\Product;
use Doctrine\Common\Collections\ArrayCollection;
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
        return array_reduce($this->lines->toArray(), function(Money $total, OrderLine $line) {

            return $total->add($line->price());
        }, $zero);
    }
}