<?php

namespace Modules\ProductAdm\UseCase\DTO;

use DateTime;

class AddProductOutputDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public float $purchasePrice,
        public int $stock,
        public DateTime $createdAt,
        public DateTime $updatedAt,
    ) {
    }
}
