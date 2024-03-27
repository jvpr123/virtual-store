<?php

namespace Modules\Shared\Domain\ValueObjects;

class Uuid implements ValueObjectInterface
{
    public string $value;

    public function __construct(?string $id = null)
    {
        if (!$id) {
            $this->value = uuid_create();
            return;
        }

        if (!self::validate($id)) {
            throw new \Exception();
        }

        $this->value = $id;
    }

    public static function validate(?string $id): bool
    {
        return !$id ? false : uuid_is_valid((string) $id);
    }
}
