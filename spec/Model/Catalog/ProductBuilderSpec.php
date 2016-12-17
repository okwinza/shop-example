<?php

namespace spec\App\Model\Catalog;

use App\Model\Catalog\ProductBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProductBuilder::class);
    }
}
