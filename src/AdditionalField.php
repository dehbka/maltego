<?php

declare(strict_types=1);

namespace Dehbka\Maltego;

final class AdditionalField
{
    public function __construct(private string $name, private string $value)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
