<?php

namespace Src\Modules\ProductAdm\UseCase\AddProduct;

class AddProductInputDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public float $purchasePrice,
        public int $stock,
    ) {
    }
}
