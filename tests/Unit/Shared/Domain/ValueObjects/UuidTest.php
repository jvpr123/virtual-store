<?php

namespace Tests\Unit\Shared\Domain\ValueObjects;

use Src\Modules\Shared\Domain\ValueObjects\Uuid;
use Webpatser\Uuid\Uuid as LaravelUuid;

describe('UUID Value Object Validation', function () {
    it('should return TRUE if validation succeeds', function () {
        $uuid = LaravelUuid::generate(ver: 4)->string;
        $output = Uuid::validate($uuid);
        expect($output)->toBeTrue();
    });

    it('should return FALSE if validation fails', function () {
        $output = Uuid::validate('');
        expect($output)->toBeFalse();
    });
});

describe('UUID Value Object Retrieve', function () {
    it('should return uuid auto created successfully', function () {
        $sut = new Uuid();
        expect($sut->getId())->toBeString();
    });

    it('should return uuid passed by param successfully', function () {
        $uuid = LaravelUuid::generate(ver: 4)->string;
        $sut = new Uuid($uuid);
        expect($sut->getId())->toBe($uuid);
    });
});
