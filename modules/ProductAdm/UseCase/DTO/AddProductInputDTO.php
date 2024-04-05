<?php

namespace Modules\ProductAdm\UseCase\DTO;

class AddProductInputDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public float $purchasePrice,
        public int $stock,
        public ?string $id = null,
    ) {
    }
}
