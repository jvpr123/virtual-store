<?php

namespace Tests\Unit\Modules\ProductAdm\Facade;

use Modules\ProductAdm\Domain\Product;
use Modules\ProductAdm\Facade\DTO\AddProductFacadeInputDTO;
use Modules\ProductAdm\Facade\DTO\CheckProductStockFacadeOutputDTO;
use Modules\ProductAdm\Facade\ProductAdmFacade;
use Modules\ProductAdm\UseCase\AddProductUseCase;
use Modules\ProductAdm\UseCase\CheckProductStockUseCase;
use Modules\ProductAdm\UseCase\DTO\CheckProducStocktInputDTO;

describe('ProductAdmFacade addProduct unit tests', function () {
    beforeEach(function () {
        $this->mockAddProductUseCase = \Mockery::mock(AddProductUseCase::class);
        $this->mockCheckProductStockUseCase = \Mockery::mock(CheckProductStockUseCase::class);
        $this->facade = new ProductAdmFacade(
            $this->mockAddProductUseCase,
            $this->mockCheckProductStockUseCase,
        );

        $this->input = new AddProductFacadeInputDTO(
            name: 'product_name',
            description: 'product_description',
            purchasePrice: 100.00,
            stock: 100,
        );
    });

    it('should add a product calling proper use-case via facade successfully', function () {
        $this->mockAddProductUseCase
            ->expects()
            ->execute($this->input)
            ->once();

        expect($this->facade->addProduct($this->input))->toBeNull();
    });

    it('should throw exception on use-case error', function () {
        $this->mockAddProductUseCase
            ->expects()
            ->execute($this->input)
            ->andThrow(new \Exception('Error on use-case.'))
            ->once();

        expect(fn () => $this->facade->addProduct($this->input))
            ->toThrow(new \Exception('Error on use-case.'));
    });
});

describe('ProductAdmFacade checkStock unit tests', function () {
    beforeEach(function () {
        $this->mockAddProductUseCase = \Mockery::mock(AddProductUseCase::class);
        $this->mockCheckProductStockUseCase = \Mockery::mock(CheckProductStockUseCase::class);
        $this->facade = new ProductAdmFacade(
            $this->mockAddProductUseCase,
            $this->mockCheckProductStockUseCase,
        );

        $this->product = new Product(
            name: 'product_name',
            description: 'product_description',
            purchasePrice: 100.00,
            stock: 100,
        );

        $this->input = new CheckProducStocktInputDTO($this->product->getID()->value);
        $this->output = new CheckProductStockFacadeOutputDTO(
            productId: $this->input->productId,
            stock: $this->product->getStock(),
        );
    });

    it('should check product stock calling proper use-case via facade successfully', function () {
        $this->mockCheckProductStockUseCase
            ->expects()
            ->execute(\Mockery::type(CheckProducStocktInputDTO::class))
            ->andReturn($this->output)
            ->once();

        $output = $this->facade->checkStock($this->input->productId);

        expect($output)->toBeInstanceOf(CheckProductStockFacadeOutputDTO::class);
        expect($output->productId)->toBe($this->product->getID()->value);
        expect($output->stock)->toBe($this->product->getStock());
    });

    it('should throw exception on use-case error', function () {
        $this->mockCheckProductStockUseCase
            ->expects()
            ->execute(\Mockery::type(CheckProducStocktInputDTO::class))
            ->andThrow(new \Exception('Error on use-case.'))
            ->once();

        expect(fn () => $this->facade->checkStock($this->input->productId))
            ->toThrow(new \Exception('Error on use-case.'));
    });
});
