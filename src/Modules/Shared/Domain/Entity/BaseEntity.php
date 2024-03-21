<?php

namespace Src\Modules\Shared\Domain\Entity;

use DateTime;
use Src\Modules\Shared\Domain\ValueObjects\Uuid;

abstract class BaseEntity
{
    public function __construct(
        private Uuid $_id,
        private DateTime $_createdAt,
        private DateTime $_updatedAt,
    ) {
    }

    public function getID(): Uuid
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
