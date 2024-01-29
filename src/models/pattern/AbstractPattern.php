<?php

require_once 'IPattern.php';

abstract class AbstractPattern implements IPattern
{
    protected string $id;
    public string $name;
    public string $query;
    protected array $filters;
    protected array $offers;

    public function __construct(string $id, string $name, string $query, array $filters)
    {
        $this->id = $id;
        $this->name = $name;
        $this->query = $query;
        $this->filters = $filters;
        $this->offers = [];
    }

    public function getOffers(): ?array
    {
        if ($this->offers === null) {
            return null;
        }
        else {
            return $this->offers;
        }
    }
    
    abstract public function refreshOffers(): void;
}