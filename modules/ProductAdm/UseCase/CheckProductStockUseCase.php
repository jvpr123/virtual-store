<?php

namespace Modules\ProductAdm\UseCase;

use Modules\ProductAdm\Domain\Product;
use Modules\ProductAdm\Gateway\ProductGatewayInterface;
use Modules\ProductAdm\UseCase\DTO\CheckProducStocktInputDTO;
use Modules\ProductAdm\UseCase\DTO\CheckProducStocktOutputDTO;
use Modules\Shared\Exception\EntityNotFoundException;

class CheckProductStockUseCase
{
    public function __construct(private ProductGatewayInterface $productRepository)
    {
    }

    public function execute(CheckProducStocktInputDTO $input): CheckProducStocktOutputDTO
    {
        $product = $this->productRepository->find($input->productId);

        if (!$product) {
            throw new EntityNotFoundException(Product::class, $input->productId);
        }

        return new CheckProducStocktOutputDTO(
            productId: $product->getID()->value,
            stock: $product->getStock(),
        );
    }
}
