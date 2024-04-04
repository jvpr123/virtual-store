<?php

namespace Modules\ProductAdm\Repository;

use App\Models\Product;
use Carbon\Carbon;
use Modules\ProductAdm\Domain\Product as ProductEntity;
use Modules\ProductAdm\Gateway\ProductGatewayInterface;
use Modules\Shared\Domain\ValueObjects\Uuid;

class ProductRepository implements ProductGatewayInterface
{
    public function add(ProductEntity $productEntity): void
    {
        $product = new Product([
            'uuid' => $productEntity->getId()->value,
            'name' => $productEntity->getName(),
            'description' => $productEntity->getDescription(),
            'purchase_price' => $productEntity->getPurchasePrice(),
            'stock' => $productEntity->getStock(),
            'created_at' => $productEntity->getCreatedAt(),
            'updated_at' => $productEntity->getUpdatedAt(),
        ]);
        $product->saveOrFail();
    }

    public function find(string $id): ?ProductEntity
    {
        $product = Product::where('uuid', $id)->first();

        return $product ? new ProductEntity(
            id: new Uuid($product->uuid),
            name: $product->name,
            description: $product->description,
            purchasePrice: $product->purchase_price,
            stock: $product->stock,
            createdAt: new Carbon($product->created_at),
            updatedAt: new Carbon($product->updated_at),
        ) : null;
    }
}
