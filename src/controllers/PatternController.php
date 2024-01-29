<?php

require_once 'AppController.php';
require_once __DIR__.'/../../Database.php';
require_once __DIR__.'/../models/pattern/PatternAllegro.php';



class PatternController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function patterns()
    {
        if (!$this->isSession()) {
            header("Location: /login");
        }
        return $this->render('patterns');
    }

    public function new_pattern()
    {
        if (!$this->isSession()) {
            header("Location: /login");
        }
        return $this->render('add_new');
    }

    public function offers()
    {
        if (!$this->isSession()) {
            header("Location: /");
        }
        $database = new Database();
        //TODO: dodać blokowanie nieuprawnionego użytkownika
        $stmt = $database->connect()->prepare('
        SELECT p."ID", p."Type", p."Query", p."Name" FROM "PATTERN" p
            WHERE p."ID" = :id
        ');

        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
        $stmt->execute();
        
        $patternData = $stmt->fetch(PDO::FETCH_ASSOC);

        $pattern = new PatternAllegro($patternData['ID'], $patternData['Name'], $patternData['Query'], []);
        $pattern->refreshOffers();

        return $this->render('results', ['offers' => $pattern->getOffers()]);

    }
}
