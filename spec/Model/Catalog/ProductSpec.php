<?php

namespace spec\App\Model\Catalog;

use App\Model\Catalog\{ProductBuilder};
use Money\{Currency, Money};
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function it_can_be_create_using_builder()
    {
        $this->beConstructedWith((
            (new ProductBuilder())
                ->withName('Test Product')
                ->withDescription('Test Product Description')
                ->withPrice(new Money(10, new Currency('USD')))
        ));

        $this->shouldNotThrow()->duringInstantiation();
    }

    function it_cant_be_created_if_mandatory_data_is_not_setted()
    {
        $this->beConstructedWith((
        (new ProductBuilder())
            ->withName('Test Product')
            ->withPrice(new Money(10, new Currency('USD')))
        ));

        $this->shouldThrow()->duringInstantiation();
    }
}
