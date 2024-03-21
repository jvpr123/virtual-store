<?php

namespace Src\Modules\Shared\Domain\Entity;

use DateTime;

abstract class BaseEntity
{
    public function __construct(
        private int $_id,
        private DateTime $_createdAt,
        private DateTime $_updatedAt,
    ) {
    }

    public function getID(): int
    {
        return $this->_id;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->_createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->_updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->_updatedAt = $updatedAt;
    }
}
