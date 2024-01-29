<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class PatternRepository extends Repository
{
    public function getPatternOffers(int $id){
        $query = $this->database->connect()->prepare('
        SELECT * 
        FROM PATTERN p
        WHERE
            p."ID" = :id
        ');
    }

}