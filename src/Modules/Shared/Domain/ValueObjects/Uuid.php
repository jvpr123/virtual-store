<?php

namespace Src\Modules\Shared\Domain\ValueObjects;

use Webpatser\Uuid\Uuid as LaravelUuid;

class Uuid implements ValueObjectInterface
{
    public string $value;

    public function __construct(?string $id = null)
    {
        if (!$id) {
            $this->value = LaravelUuid::generate(ver: 4);
            return;
        }

        if (!self::validate($id)) {
            throw new \Exception();
        }

        $this->value = $id;
    }

    public static function validate(?string $id): bool
    {
        return !$id ? false : LaravelUuid::validate((string) $id);
    }
}
