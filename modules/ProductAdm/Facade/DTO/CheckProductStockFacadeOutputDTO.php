<?php

namespace Modules\ProductAdm\Facade\DTO;

class CheckProductStockFacadeOutputDTO
{
    public function __construct(
        public string $productId,
        public int $stock,
    ) {
    }
}
