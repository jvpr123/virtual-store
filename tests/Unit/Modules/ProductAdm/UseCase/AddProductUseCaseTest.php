<?php

namespace Tests\Unit\Modules\ProductAdm\UseCase;

use DateTime;
use Src\Modules\ProductAdm\Domain\ProductEntity;
use Src\Modules\ProductAdm\Gateway\ProductGatewayInterface;
use Src\Modules\ProductAdm\UseCase\AddProduct\AddProductInputDTO;
use Src\Modules\ProductAdm\UseCase\AddProduct\AddProductOutputDTO;
use Src\Modules\ProductAdm\UseCase\AddProduct\AddProductUseCase;
use Webpatser\Uuid\Uuid as LaravelUuid;

describe('Add Product Use Case Unit Tests', function () {
    beforeEach(function () {
        $this->productRepository = \Mockery::mock(ProductGatewayInterface::class);
        $this->useCase = new AddProductUseCase($this->productRepository);
        $this->inputDTO = new AddProductInputDTO(
            id: LaravelUuid::generate(ver: 4),
            name: 'product_name',
            description: 'product_description',
            purchasePrice: 100.00,
            stock: 50
        );
    });

    it('should add a product successfully', function () {
        $this->productRepository
            ->expects()
            ->add(\Mockery::type(ProductEntity::class))
            ->once();

        $output = $this->useCase->execute($this->inputDTO);

        expect($output)->toBeInstanceOf(AddProductOutputDTO::class);
        expect($output->id)->toBe($this->inputDTO->id);
        expect($output->name)->toBe($this->inputDTO->name);
        expect($output->description)->toBe($this->inputDTO->description);
        expect($output->purchasePrice)->toBe($this->inputDTO->purchasePrice);
        expect($output->stock)->toBe($this->inputDTO->stock);
        expect($output->createdAt)->toBeInstanceOf(DateTime::class);
        expect($output->updatedAt)->toBeInstanceOf(DateTime::class);
    });

    it('should throw exception on repository error', function () {
        $this->productRepository
            ->expects()
            ->add(\Mockery::type(ProductEntity::class))
            ->andThrow(new \Exception('Product repository error.'))
            ->once();

        $this->useCase->execute($this->inputDTO);
    })->throws(\Exception::class, 'Product repository error.');
});
