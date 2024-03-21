<?php

namespace Src\Modules\Shared\Domain\ValueObjects;

use Webpatser\Uuid\Uuid as LaravelUuid;

class Uuid implements ValueObjectInterface
{
    private string $_id;

    public function __construct(?string $id)
    {
        if (!$id) {
            $this->_id = LaravelUuid::generate(ver: 4);
        }

        if (!self::validate($id)) {
            throw new \Exception();
        }

        $this->_id = $id;
    }

    public function getId(): string
    {
        return $this->_id;
    }

    public static function validate(?string $id): bool
    {
        return LaravelUuid::validate((string) $id);
    }
}
