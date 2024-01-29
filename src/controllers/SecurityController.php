<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../../Database.php';


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
        if ($this->isSession()) {
            header("Location: /new_pattern");
        }

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($login) ?: $this->userRepository->getUserByEmail($login);

        if ($user == null) {
            return $this->render('login', ['inv_login' => 'Invalid login/password']);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['inv_login' => 'Invalid login/password']);
        }

        $url = "http://$_SERVER[HTTP_HOST]";

        if (session_status() == PHP_SESSION_NONE) {
        
            session_start();
        }

        $_SESSION['user_id'] = $user->getId();

        //return $this->render('patterns', []);
        header("Location: {$url}/patterns");
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

        if ($this->userRepository->getUser($username)) {
            return $this->render('login', ['messages' => ['This username already exists']]);
        }

        if ($this->userRepository->getUserByEmail($email)) {
            return $this->render('login', ['messages' => ['This email already exists']]);
        }

        //TODO try to use better hash function

        $this->userRepository->addUser($username, $email, password_hash($password, PASSWORD_BCRYPT));

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    public function account()
    {
        if ($this->isSession())
        {
            return $this->render("account");
        }
        return $this->render("login");
    }
}
