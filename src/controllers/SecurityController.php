<?php

require_once 'AppController.php';
require_once __DIR__.'/../../Database.php';


class SecurityController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }
        
        $stmt = new Database();
        $stmt = $stmt->connect()->prepare('
        SELECT * FROM USER
        
        ');
        $stmt->execute();
        $user = $stmt->fetchall();
        var_dump($user);
    }
}
