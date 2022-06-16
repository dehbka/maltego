<?php

declare(strict_types=1);

namespace Dehbka\Maltego;

abstract class AbstractEntity implements Entity
{
    /** @var AdditionalField[] */
    private array $additionalFields = [];

    public function __construct(
        private string $value,
        private int $weight = 100,
    ) {
    }

    abstract public function getType(): string;

    public function getValue(): string
    {
        return $this->value;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function addAdditionalField(AdditionalField $field): void
    {
        $this->additionalFields[] = $field;
    }

    public function getAdditionFields(): array
    {
        return $this->additionalFields;
    }
}
