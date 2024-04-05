<?php

namespace Tests\Unit\Modules\ProductAdm\Factory;

use Modules\ProductAdm\Facade\ProductAdmFacade;
use Modules\ProductAdm\Factory\ProductAdmFacadeFactory;

describe('ProductAdmFacade factory unit tests', function () {
    it('should return product adm facade successfully', function () {
        $output = ProductAdmFacadeFactory::create();
        expect($output)->toBeInstanceOf(ProductAdmFacade::class);
    });
});
