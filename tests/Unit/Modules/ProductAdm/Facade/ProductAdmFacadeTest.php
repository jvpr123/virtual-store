<?php

namespace Tests\Unit\Modules\ProductAdm\Facade;

use Modules\ProductAdm\Facade\DTO\AddProductFacadeInputDTO;
use Modules\ProductAdm\Facade\ProductAdmFacade;
use Modules\ProductAdm\UseCase\AddProductUseCase;

describe('ProductAdmFacade addProduct unit tests', function () {
    beforeEach(function () {
        $this->mockAddProductUseCase = \Mockery::mock(AddProductUseCase::class);
        $this->facade = new ProductAdmFacade($this->mockAddProductUseCase);

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
