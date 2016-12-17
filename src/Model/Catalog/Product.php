<?php

namespace App\Model\Catalog;

use Money\Money;

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct(ProductBuilder $builder)
    {
        if (empty($builder->name)
            || empty($builder->description)
            || !$builder->price instanceof Money
        ) {
            throw new \InvalidArgumentException('Please specify all mandatory data');
        }

        $this->name = $builder->name;
        $this->description = $builder->description;
        $this->price = $builder->price;
    }

    public static function builder(): ProductBuilder
    {
        return new ProductBuilder();
    }

    public function getPrice(): Money
    {
        return $this->price;
    }
}
