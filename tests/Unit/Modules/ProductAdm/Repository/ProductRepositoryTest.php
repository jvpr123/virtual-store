<?php

namespace Tests\Unit\Modules\ProductAdm\Repository;

use App\Models\Product;
use Modules\ProductAdm\Domain\Product as ProductEntity;
use Modules\ProductAdm\Repository\ProductRepository;
use Modules\Shared\Domain\ValueObjects\Uuid;

describe('ProductRepository create unit tests', function () {
    beforeEach(function () {
        $this->repository = new ProductRepository();
        $this->product = new ProductEntity(
            id: new Uuid(uuid_create()),
            name: 'product_name',
            description: 'product_description',
            purchasePrice: 100.00,
            stock: 50
        );
    });

    it('should add a product successfully', function () {
        $output = $this->repository->add($this->product);

        expect($output)->toBeNull();
        $this->assertDatabaseHas('products', [
            'uuid' => $this->product->getId()->value,
            'name' => $this->product->getName(),
            'description' => $this->product->getDescription(),
            'purchase_price' => $this->product->getPurchasePrice(),
            'stock' => $this->product->getStock(),
        ]);
    });

    it('should throw exception on saving product error', function () {
        expect(function () {
            Product::saving(throw new \Exception('Error saving product.'));
            $this->repository->add($this->product);
        })->toThrow(new \Exception('Error saving product.'));
    });
});

describe('ProductRepository find unit tests', function () {
    beforeEach(function () {
        $this->productEntity = new ProductEntity(
            id: new Uuid(uuid_create()),
            name: 'product_name',
            description: 'product_description',
            purchasePrice: 100.00,
            stock: 50
        );
        $this->productModel = Product::factory()->create([
            'uuid' => $this->productEntity->getID()->value,
            'name' => $this->productEntity->getName(),
            'description' => $this->productEntity->getDescription(),
            'purchase_price' => $this->productEntity->getPurchasePrice(),
            'stock' => $this->productEntity->getStock(),
            'created_at' => $this->productEntity->getCreatedAt(),
            'updated_at' => $this->productEntity->getUpdatedAt(),
        ]);

        $this->repository = new ProductRepository();
    });

    it('should find a product by ID successfully', function () {
        $output = $this->repository->find($this->productModel->uuid);
        expect($output)->toBeInstanceOf(ProductEntity::class);
        expect($output->getID()->value)->toBe($this->productModel->uuid);
    });

    it('should return null if product not found', function () {
        $output = $this->repository->find('invalid_uuid');
        expect($output)->toBeNull();
    });
});
