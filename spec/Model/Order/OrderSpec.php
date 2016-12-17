<?php

namespace spec\App\Model\Order;

use Money\Currency;
use Money\Money;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\App\CatalogFakeData;

class OrderSpec extends ObjectBehavior
{
    function it_returns_total_price()
    {
        $this->add(
            CatalogFakeData::randomProductWithPrice(10), 1
        );
        $this->add(
            CatalogFakeData::randomProductWithPrice(5), 1
        );

        $price = $this->price();
        $price->equals(new Money(15, new Currency('USD')))->shouldReturn(true);
    }

    function it_applies_10_procent_discount_in_case_if_there_are_more_then_one_product_ordered()
    {
        $this->add(
            CatalogFakeData::randomProductWithPrice(10), 2
        );
        $this->add(
            CatalogFakeData::randomProductWithPrice(20), 1
        );

        $price = $this->price();
        $price->equals(new Money(36, new Currency('USD')))->shouldReturn(true);
    }
}
