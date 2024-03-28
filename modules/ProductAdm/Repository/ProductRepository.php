<?php

namespace Modules\ProductAdm\Repository;

use App\Models\Product;
use Modules\ProductAdm\Domain\Product as ProductEntity;
use Modules\ProductAdm\Gateway\ProductGatewayInterface;

class ProductRepository implements ProductGatewayInterface
{
    public function add(ProductEntity $productEntity): void
    {
        $product = new Product();
        $product->fill([
            'id' => $productEntity->getId()->value,
            'name' => $productEntity->getName(),
            'description' => $productEntity->getDescription(),
            'purchase_price' => $productEntity->getPurchasePrice(),
            'stock' => $productEntity->getStock(),
            'created_at' => $productEntity->getCreatedAt(),
            'updated_at' => $productEntity->getUpdatedAt(),
        ]);
        $product->saveOrFail();
    }

    public function find(string $id): ProductEntity
    {
        return new ProductEntity('', '', 0, 0);
    }
}
