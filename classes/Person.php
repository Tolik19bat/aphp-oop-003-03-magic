<?php

declare(strict_types=1);

namespace classes;

class Person
{
    public function __construct(
        public string $firstName,
        public string $lastName
    )
    {
    }

    // Магический метод __get
    public function __get($property): ?string
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    // Магический метод __set
    public function __set($property, $value): void
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // Магический метод __sleep
    public function __sleep(): array
    {
        return ['firstName', 'lastName'];
    }

    // Магический метод __wakeup
    public function __wakeup(): void
    {
        // Допустим, выполняем какую-то логику при десериализации
        if (!$this->firstName) {
            $this->firstName = "Unknown";
        }
    }

    // Магический метод __toString
    public function __toString(): string
    {
        return "$this->firstName $this->lastName";
    }
}
