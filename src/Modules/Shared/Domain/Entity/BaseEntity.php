<?php

namespace Src\Modules\Shared\Domain\Entity;

use DateTime;
use Src\Modules\Shared\Domain\ValueObjects\Uuid;

abstract class BaseEntity
{
    private Uuid $id;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(?Uuid $id, ?DateTime $createdAt, ?DateTime $updatedAt)
    {
        $this->id = $id ? $id : new Uuid();
        $this->createdAt = $createdAt ? $createdAt : new DateTime();
        $this->updatedAt = $updatedAt ? $updatedAt : new DateTime();
    }

    public function getID(): Uuid
    {
        return $this->id;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
