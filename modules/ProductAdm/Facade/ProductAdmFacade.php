<?php

namespace Modules\ProductAdm\Facade;

use Modules\ProductAdm\Facade\DTO\AddProductFacadeInputDTO;
use Modules\ProductAdm\Facade\DTO\CheckProductStockFacadeOutputDTO;
use Modules\ProductAdm\UseCase\AddProductUseCase;

class ProductAdmFacade implements __BaseProductAdmFacade
{
    public function __construct(private AddProductUseCase $addProductUseCase)
    {
    }

    public function addProduct(AddProductFacadeInputDTO $input): void
    {
        $this->addProductUseCase->execute($input);
    }

    public function checkStock(?string $productId): CheckProductStockFacadeOutputDTO
    {
        throw new \Exception();
    }
}
