<?php

namespace Modules\ProductAdm\UseCase\DTO;

class CheckProducStocktInputDTO
{
    public function __construct(public ?string $productId = null)
    {
    }
}
