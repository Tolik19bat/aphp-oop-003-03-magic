<?php

declare(strict_types=1);

namespace classes;

use interfaces\CustomIterator;
use Iterator;

class PeopleList implements CustomIterator, Iterator
{
    private array $people = [];
    private int $position = 0;

    public function addPerson(Person $person): void
    {
        $this->people[] = $person;
    }

    public function current(): mixed
    {
        return $this->people[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->people[$this->position]);
    }

    public function __toString(): string
    {
        return implode(", ", array_map(fn($person) => (string)$person, $this->people));
    }
}
