<?php

class User {
    private $id;
    private $email;
    private $password;
    private $username;
    public function __construct(
        string $username,
        string $email,
        string $password,
        $id
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}