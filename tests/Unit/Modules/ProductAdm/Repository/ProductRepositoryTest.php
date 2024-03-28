<?php

namespace Tests\Unit\Modules\ProductAdm\Repository;

use Modules\ProductAdm\Domain\Product as ProductEntity;
use Modules\ProductAdm\Repository\ProductRepository;
use Modules\Shared\Domain\ValueObjects\Uuid;

describe('ProductRepository Unit Tests', function () {
    beforeEach(function () {
        $this->repository = new ProductRepository();
    });

    it('should add a product successfully', function () {
        $product = new ProductEntity(
            id: new Uuid($uuid = uuid_create()),
            name: 'product_name',
            description: 'product_description',
            purchasePrice: 100.00,
            stock: 50
        );

        $output = $this->repository->add($product);

        expect($output)->toBeNulll();
        $this->assertDatabaseHas('products', ['id' => $uuid]);
    });
});
