<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../repositories/UserRepository.php';
require_once __DIR__.'/../../Database.php';


class SecurityController extends AppController
{
    private $userRepository;
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }
    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $login = $_POST['login'];
        $password = md5($_POST['password']);

        $user = $this->userRepository->getUser($login) ?: $this->userRepository->getUserByEmail($login);

        if ($user == null) {
            return $this->render('login', ['messages' => ['Invalid login/password1']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Invalid login/password2']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");

        //tutaj dodać session user
        
        // $stmt = new Database();
        // $stmt = $stmt->connect()->prepare('
        // SELECT * FROM USER
        
        // ');
        // $stmt->execute();
        // $user = $stmt->fetchall();
        // var_dump($user);
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['password_repeat'];
        var_dump($password, $confirmedPassword);
        if ($password !== $confirmedPassword) {
            return $this->render('login', ['messages' => ['Please provide proper password']]);
        }

        //TODO try to use better hash function
        $user = new User($username, $email, md5($password));

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
    
}
