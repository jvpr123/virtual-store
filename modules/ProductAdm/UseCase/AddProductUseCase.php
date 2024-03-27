<?php

namespace Modules\ProductAdm\UseCase;

use Modules\ProductAdm\Domain\Product;
use Modules\ProductAdm\DTO\AddProductInputDTO;
use Modules\ProductAdm\DTO\AddProductOutputDTO;
use Modules\ProductAdm\Gateway\ProductGatewayInterface;
use Modules\Shared\Domain\ValueObjects\Uuid;

class AddProductUseCase
{
    public function __construct(private ProductGatewayInterface $productRepository)
    {
    }

    public function execute(AddProductInputDTO $input): AddProductOutputDTO
    {
        $product = new Product(
            id: new Uuid($input->id),
            name: $input->name,
            description: $input->description,
            purchasePrice: $input->purchasePrice,
            stock: $input->stock
        );

        $this->productRepository->add($product);

        return new AddProductOutputDTO(
            id: $product->getID()->value,
            name: $product->getName(),
            description: $product->getDescription(),
            purchasePrice: $product->getPurchasePrice(),
            stock: $product->getStock(),
            createdAt: $product->getCreatedAt(),
            updatedAt: $product->getupdatedAt(),
        );
    }
}
