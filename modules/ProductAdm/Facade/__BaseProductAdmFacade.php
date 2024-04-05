<?php

namespace Modules\ProductAdm\Facade;

use Modules\ProductAdm\Facade\DTO\AddProductFacadeInputDTO;
use Modules\ProductAdm\Facade\DTO\CheckProductStockFacadeOutputDTO;

interface __BaseProductAdmFacade
{
    public function addProduct(AddProductFacadeInputDTO $input): void;
    public function checkStock(?string $productId): CheckProductStockFacadeOutputDTO;
}
