<?php

namespace Src\Modules\ProductAdm\Domain;

use DateTime;
use Src\Modules\Shared\Domain\Entity\AggregateRootInterface;
use Src\Modules\Shared\Domain\Entity\BaseEntity;

class ProductEntity extends BaseEntity implements AggregateRootInterface
{
    public function __construct(
        int $id,
        private string $_name,
        private string $_description,
        private float $_purchasePrice,
        private int $_stock,
        DateTime $createdAt,
        DateTime $updatedAt,
    ) {
        parent::__construct($id, $createdAt, $updatedAt);
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    public function getDescription(): string
    {
        return $this->_description;
    }

    public function setDescription(string $description): void
    {
        $this->_description = $description;
    }

    public function getPurchasePrice(): float
    {
        return $this->_purchasePrice;
    }

    public function setPurchasePrice(float $purchasePrice): void
    {
        $this->_purchasePrice = $purchasePrice;
    }

    public function getStock(): int
    {
        return $this->_stock;
    }

    public function setStock(int $stock): void
    {
        $this->_stock = $stock;
    }
}
