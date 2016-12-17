<?php

namespace spec\App;

use App\Model\Catalog\Product;
use Money\{Currency, Money};

final class CatalogFakeData
{
    public static function randomProduct(): Product
    {
        return Product::builder()
            ->withName('Test Product 2')
            ->withDescription('Test Product Description')
            ->withPrice(new Money(mt_rand(1, 100), new Currency('USD')))
            ->build();
    }

    public static function randomProductWithPrice(int $price): Product
    {
        return Product::builder()
            ->withName('Test Product')
            ->withDescription('Test Product Description')
            ->withPrice(new Money($price, new Currency('USD')))
            ->build();
    }
}