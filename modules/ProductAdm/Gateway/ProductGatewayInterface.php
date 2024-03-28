<?php

namespace Modules\ProductAdm\Gateway;

use Modules\ProductAdm\Domain\Product;

interface ProductGatewayInterface
{
    public function add(Product $product): void;
    public function find(string $id): Product;
}
