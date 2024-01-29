<?php

interface ICustomFilter 
{
    public function matches(IOffer $offer): bool;
}