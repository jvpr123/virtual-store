<?php

namespace Modules\ProductAdm\Gateway;

use Modules\ProductAdm\Domain\Product;

interface ProductGatewayInterface
{
    function add(Product $product): void;
    function find(string $id): Product;
}
