<?php

interface IOffer
{
    public function getId();
    public function getLink(): string;
    public function getPrice();
    public function getName(): string;
}