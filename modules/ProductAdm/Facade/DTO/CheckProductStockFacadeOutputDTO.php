<?php

namespace Modules\ProductAdm\Facade\DTO;

use Modules\ProductAdm\UseCase\DTO\CheckProducStocktOutputDTO;

class CheckProductStockFacadeOutputDTO extends CheckProducStocktOutputDTO
{
    public function __construct(
        public string $productId,
        public int $stock,
    ) {
    }
}
