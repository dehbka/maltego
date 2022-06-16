<?php

declare(strict_types=1);

namespace Dehbka\Maltego;

interface Entity
{
    public function getType(): string;

    public function getValue(): string;

    public function getWeight(): int;

    /** @return AdditionalField[] */
    public function getAdditionFields(): array;
}
