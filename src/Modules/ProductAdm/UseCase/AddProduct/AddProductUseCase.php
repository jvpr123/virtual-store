<?php

namespace Src\Modules\ProductAdm\UseCase\AddProduct;

use Src\Modules\ProductAdm\Domain\ProductEntity;
use Src\Modules\ProductAdm\Gateway\ProductGatewayInterface;

class AddProductUseCase
{
    public function __construct(private ProductGatewayInterface $repository)
    {
    }

    public function execute(AddProductInputDTO $input): void
    {
    }
}
