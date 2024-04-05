<?php

namespace Tests\Unit\Modules\ProductAdm\UseCase;

use Modules\ProductAdm\Domain\Product;
use Modules\ProductAdm\Gateway\ProductGatewayInterface;
use Modules\ProductAdm\UseCase\CheckProductStockUseCase;
use Modules\ProductAdm\UseCase\DTO\CheckProducStocktInputDTO;
use Modules\ProductAdm\UseCase\DTO\CheckProducStocktOutputDTO;
use Modules\Shared\Exception\EntityNotFoundException;

describe('CheckProductStockUseCase unit tests', function () {
    beforeEach(function () {
        $this->repository = \Mockery::mock(ProductGatewayInterface::class);
        $this->useCase = new CheckProductStockUseCase($this->repository);

        $this->product = new Product(
            name: 'product_name',
            description: 'product_description',
            purchasePrice: 100.00,
            stock: 100,
        );
        $this->productId = $this->product->getID()->value;
        $this->inputDTO = new CheckProducStocktInputDTO($this->productId);
    });

    it('should return a product stock successfully', function () {
        $this->repository
            ->expects()
            ->find($this->productId)
            ->andReturn($this->product)
            ->once();

        $output = $this->useCase->execute($this->inputDTO);

        expect($output)->toBeInstanceOf(CheckProducStocktOutputDTO::class);
        expect($output->productId)->toBe($this->productId);
        expect($output->stock)->toBe($this->product->getStock());
    });

    it('should throw exception if product not found', function () {
        $this->repository
            ->expects()
            ->find($this->productId)
            ->andReturnNull()
            ->once();

        expect(fn () => $this->useCase->execute($this->inputDTO))
            ->toThrow(new EntityNotFoundException(Product::class, $this->inputDTO->productId));
    });
});
