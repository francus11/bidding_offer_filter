<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $username): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "USER"
            WHERE "Username" = :username
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['Username'],
            $user['Email'],
            $user['Password'],
            $user['ID']
        );
    }
    public function getUserByEmail(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "USER" u
            WHERE "Email" = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['Username'],
            $user['Email'],
            $user['Password'],
            $user['ID']
        );
    }

    public function addUser($username, $email, $password)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "USER" ("Username", "Email", "Password")
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $username,
            $email,
            $password
        ]);
    }

}