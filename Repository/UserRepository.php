<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user, user_data WHERE email = :email and user.id_user_data=user_data.id_user_data
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['id_user'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

//    public function getUsers(): array {
//        $result = [];
//        $stmt = $this->database->connect()->prepare('
//            SELECT * FROM users
//        ');
//        $stmt->execute();
//        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        foreach ($users as $user) {
//            $result[] = new User(
//                $user['email'],
//                $user['password'],
//                $user['name'],
//                $user['surname'],
//                $user['id']
//            );
//        }
//
//        return $result;
//    }

//    public function addUser(string $email, string $password, string $name, string $surname){
//
//        $stmt = $this->database->connect()->prepare("
//            INSERT INTO users (email, password, name, surname)
//            VALUES ('$email','$password','$name','$surname')
//        ");
//        $stmt->execute();
//
//        $stmt = $this->database->connect()->prepare("
//            SELECT * FROM users WHERE email = :email
//        ");
//        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//
//        $stmt->execute();
//
//        $user = $stmt->fetch(PDO::FETCH_ASSOC);
//
//        if($user == false) {
//            return null;
//        }
//        return new User(
//            $user['id'],
//            $user['email'],
//            $user['password'],
//            $user['name'],
//            $user['surname']
//        );
//    }
}