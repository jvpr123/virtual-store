<?php

namespace Modules\ProductAdm\Factory;

use Modules\ProductAdm\Facade\__BaseProductAdmFacade;
use Modules\ProductAdm\Facade\ProductAdmFacade;
use Modules\ProductAdm\Repository\ProductRepository;
use Modules\ProductAdm\UseCase\AddProductUseCase;
use Modules\ProductAdm\UseCase\CheckProductStockUseCase;

class ProductAdmFacadeFactory
{
    public static function create(): __BaseProductAdmFacade
    {
        $repository = new ProductRepository();

        $addProductUseCase = new AddProductUseCase($repository);
        $checkProductStockUseCase = new CheckProductStockUseCase($repository);

        return new ProductAdmFacade($addProductUseCase, $checkProductStockUseCase);
    }
}
