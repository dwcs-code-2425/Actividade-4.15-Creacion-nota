<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
final class NotaTituloUnico extends Constraint
{
    public string $message = 'El titulo "{{ value }}"  ya está en uso';

    // You can use #[HasNamedArguments] to make some constraint options required.
    // All configurable options must be passed to the constructor.
    public function __construct(
        public string $mode = 'strict',
        ?array $groups = null,
        mixed $payload = null
    ) {
        parent::__construct([], $groups, $payload);
    }

    public function getTargets(): array|string{
        return self::CLASS_CONSTRAINT;
    }
}
