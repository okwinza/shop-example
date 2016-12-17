<?php

namespace App\Model\Catalog;

use Money\Money;

class ProductBuilder
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var Money
     */
    public $price;

    public function withName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function withDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    public function withPrice(Money $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function build(): Product
    {
        return new Product($this);
    }
}
