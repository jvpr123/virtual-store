<?php

namespace Modules\Shared\Domain\Entity;

use Carbon\Carbon;
use Modules\Shared\Domain\ValueObjects\Uuid;

abstract class BaseEntity
{
    private Uuid $id;
    private Carbon $createdAt;
    private Carbon $updatedAt;

    public function __construct(?Uuid $id, ?Carbon $createdAt, ?Carbon $updatedAt)
    {
        $this->id = $id ? $id : new Uuid();
        $this->createdAt = $createdAt ? $createdAt : now();
        $this->updatedAt = $updatedAt ? $updatedAt : now();
    }

    public function getID(): Uuid
    {
        return $this->id;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
