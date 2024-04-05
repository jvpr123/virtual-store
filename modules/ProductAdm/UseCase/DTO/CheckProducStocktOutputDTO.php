<?php

namespace Modules\ProductAdm\UseCase\DTO;

class CheckProducStocktOutputDTO
{
    public function __construct(
        public string $productId,
        public int $stock,
    ) {
    }
}
