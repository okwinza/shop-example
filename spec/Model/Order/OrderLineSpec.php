<?php

namespace spec\App\Model\Order;

use Money\Currency;
use Money\Money;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\App\CatalogFakeData;

class OrderLineSpec extends ObjectBehavior
{
    function it_returns_order_line_price()
    {
        $this->beConstructedWith(
            CatalogFakeData::randomProductWithPrice(10), 10
        );

        $price = $this->price();
        $price->equals(new Money(100, new Currency('USD')))->shouldReturn(true);
    }
}
