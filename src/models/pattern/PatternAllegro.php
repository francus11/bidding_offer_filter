<?php

require_once 'AbstractPattern.php';
require_once __DIR__.'/../../../Database.php';
require_once __DIR__.'/offer/OfferAllegro.php';

class PatternAllegro extends AbstractPattern
{
    private $database;
    public function __construct(string $id, string $name, string $query, array $filters)
    {
        parent::__construct($id, $name, $query, $filters);
        $this->database = new Database();
    }

    public function refreshOffers() :void
    {
        $stmt = $this->database->connect()->prepare('
        SELECT o."ID", o."Link", o."Price", o."Name" FROM "OFFER" o 
            JOIN "PATTERN_OFFER" po 
                ON po."OfferID" = o."ID"
            WHERE po."PatternID" = :id
        ');
        $stmt->bindParam(':id', $this->id, PDO::PARAM_STR);
        $stmt->execute();

        $offer = $stmt->fetchall();

        foreach ($offer as $key => $value) {
            $offer = new OfferAllegro($value['Id'], $value['Link'], $value['Name'], $value['Price']);
            array_push($this->offers, $offer);
        }

    }
}