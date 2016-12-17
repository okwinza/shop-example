<?php

namespace App\Model\Order;

use App\Model\Catalog\Product;
use Money\Money;

class OrderLine
{
    private $product;
    private $quantity;
    private $sellPrice;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->sellPrice = $product->getPrice();
    }

    public function price(): Money
    {
        return $this->sellPrice->multiply($this->quantity);
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
