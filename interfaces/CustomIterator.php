<?php

declare(strict_types=1);

namespace interfaces;

interface CustomIterator
{
    public function current(): mixed;
    public function key(): int;
    public function next(): void;
    public function rewind(): void;
    public function valid(): bool;
}
