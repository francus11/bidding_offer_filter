<?php

class Filter
{
    private string $name;
    private array $values;
    public function __construct($name, $values)
    {
        $this->name = $name;
        $this->values = $values;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}