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
            CatalogFakeData::randomProductWithPrice(10), 10
        );
        $this->add(
            CatalogFakeData::randomProductWithPrice(5), 5
        );

        $price = $this->price();
        $price->equals(new Money(125, new Currency('USD')))->shouldReturn(true);
    }
}
