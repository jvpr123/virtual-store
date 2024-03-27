<?php

namespace Modules\ProductAdm\Domain;

use Carbon\Carbon;
use Modules\Shared\Domain\Entity\AggregateRootInterface;
use Modules\Shared\Domain\Entity\BaseEntity;
use Modules\Shared\Domain\ValueObjects\Uuid;

class Product extends BaseEntity implements AggregateRootInterface
{
    public function __construct(
        private string $name,
        private string $description,
        private float $purchasePrice,
        private int $stock,
        ?Uuid $id = null,
        ?Carbon $createdAt = null,
        ?Carbon $updatedAt = null,
    ) {
        parent::__construct($id, $createdAt, $updatedAt);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPurchasePrice(): float
    {
        return $this->purchasePrice;
    }

    public function setPurchasePrice(float $purchasePrice): void
    {
        $this->purchasePrice = $purchasePrice;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }
}
