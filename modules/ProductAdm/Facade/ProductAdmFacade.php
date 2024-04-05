<?php

namespace Modules\ProductAdm\Facade;

use Modules\ProductAdm\Facade\DTO\AddProductFacadeInputDTO;
use Modules\ProductAdm\Facade\DTO\CheckProductStockFacadeOutputDTO;
use Modules\ProductAdm\UseCase\AddProductUseCase;
use Modules\ProductAdm\UseCase\CheckProductStockUseCase;
use Modules\ProductAdm\UseCase\DTO\CheckProducStocktInputDTO;

class ProductAdmFacade implements __BaseProductAdmFacade
{
    public function __construct(
        private AddProductUseCase $addProductUseCase,
        private CheckProductStockUseCase $checkProductStockUseCase,
    ) {
    }

    public function addProduct(AddProductFacadeInputDTO $input): void
    {
        $this->addProductUseCase->execute($input);
    }

    public function checkStock(?string $productId): CheckProductStockFacadeOutputDTO
    {
        info($productId);
        $input = new CheckProducStocktInputDTO($productId);
        return $this->checkProductStockUseCase->execute($input);
    }
}
