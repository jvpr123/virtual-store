<?php

namespace Modules\Shared\Exception;

use Exception;
use Modules\Shared\Domain\Entity\BaseEntity;

class EntityNotFoundException extends Exception
{
    public function __construct(?string $entity, ?string $id)
    {
        $entityName = class_basename($entity) ?: 'Entity';
        parent::__construct("$entityName not found using ID '$id' provided.");
    }
}
