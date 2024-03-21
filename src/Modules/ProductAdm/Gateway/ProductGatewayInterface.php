<?php

namespace Src\Modules\ProductAdm\Gateway;

use Src\Modules\ProductAdm\Domain\ProductEntity;

interface ProductGatewayInterface
{
    function add(ProductEntity $product): void;
    function find(int $id): ProductEntity;
}
