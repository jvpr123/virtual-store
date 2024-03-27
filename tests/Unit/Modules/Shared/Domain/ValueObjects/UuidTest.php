<?php

namespace Tests\Unit\__modules__\Shared\Domain\ValueObjects;

use Modules\Shared\Domain\ValueObjects\Uuid;

describe('UUID Value Object Validation', function () {
    it('should return TRUE if validation succeeds', function () {
        $output = Uuid::validate(uuid_create());
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
        expect($sut->value)->toBeString();
    });

    it('should return uuid passed by param successfully', function () {
        $sut = new Uuid($uuid = uuid_create());
        expect($sut->value)->toBe($uuid);
    });
});
