<?php

namespace Tests\Unit\Modules\ProductAdm\UseCase;

use Modules\ProductAdm\Domain\Product;
use Modules\ProductAdm\DTO\AddProductInputDTO;
use Modules\ProductAdm\DTO\AddProductOutputDTO;
use Modules\ProductAdm\Gateway\ProductGatewayInterface;
use Modules\ProductAdm\UseCase\AddProductUseCase;

describe('Add Product Use Case Unit Tests', function () {
    beforeEach(function () {
        $this->productRepository = \Mockery::mock(ProductGatewayInterface::class);
        $this->useCase = new AddProductUseCase($this->productRepository);
        $this->inputDTO = new AddProductInputDTO(
            id: uuid_create(),
            name: 'product_name',
            description: 'product_description',
            purchasePrice: 100.00,
            stock: 50
        );
    });

    it('should add a product successfully', function () {
        $this->productRepository
            ->expects()
            ->add(\Mockery::type(Product::class))
            ->once();

        $output = $this->useCase->execute($this->inputDTO);

        expect($output)->toBeInstanceOf(AddProductOutputDTO::class);
        expect($output->id)->toBe($this->inputDTO->id);
        expect($output->name)->toBe($this->inputDTO->name);
        expect($output->description)->toBe($this->inputDTO->description);
        expect($output->purchasePrice)->toBe($this->inputDTO->purchasePrice);
        expect($output->stock)->toBe($this->inputDTO->stock);
        expect($output->createdAt->toString())->toBe(now()->toString());
        expect($output->updatedAt->toString())->toBe(now()->toString());
    });

    it('should throw exception on repository error', function () {
        $this->productRepository
            ->expects()
            ->add(\Mockery::type(Product::class))
            ->andThrow(new \Exception('Product repository error.'))
            ->once();

        $this->useCase->execute($this->inputDTO);
    })->throws(\Exception::class, 'Product repository error.');
});
