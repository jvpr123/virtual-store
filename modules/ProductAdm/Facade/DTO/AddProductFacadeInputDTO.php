<?php

namespace Modules\ProductAdm\Facade\DTO;

use Modules\ProductAdm\UseCase\DTO\AddProductInputDTO;

class AddProductFacadeInputDTO extends AddProductInputDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public float $purchasePrice,
        public int $stock,
        public ?string $id = null,
    ) {
        parent::__construct(
            $name,
            $description,
            $purchasePrice,
            $stock,
            $id
        );
    }
}
