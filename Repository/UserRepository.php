<?php

require_once "Repository.php";
require_once __DIR__ . '//..//Models//User.php';
require_once __DIR__ . '//..//Models//OtherUser.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user, user_data WHERE email = :email and user.id_user_data=user_data.id_user_data
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id_user'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['role']
        );
    }

    public function getActiveUser(string $email): ?OtherUser
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM alluserdata WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new OtherUser(
            $user['id_user_data'],
            $user['email'],
            $user['name'],
            $user['surname'],
            $user['points'],
            $user['plate_number'],
            $user['role']
        );
    }

    public function getUsers(): array
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM alluserdata
WHERE email != :email;');

            $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            die();
        }

    }

    public function addUser(string $email, string $password, string $name, string $surname, string $phoneNumber, string $plateNumber, string $brand, string $model, string $cardNumber, string $cardholderName, string $expireDate, int $cvv)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM user_data WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return null;
        }


        $stmt = $this->database->connect()->prepare("
            CALL addUser('$email', '$password', '$name', '$surname', '$phoneNumber', '$plateNumber', '$brand', '$model', '$cardNumber', '$cardholderName', '$expireDate', '$cvv')
        ");
        $stmt->execute();


        $stmt = $this->database->connect()->prepare("
            SELECT * FROM user_data WHERE email = :email
        ");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }
        return new User(
            $user['id_user_data'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['role']
        );
    }

    public function delete(int $id): void
    {
        try {
            $stmt = $this->database->connect()->prepare("
            CALL deleteUser('$id')
            ");
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function getPoints(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT points, public_transport, parking_time, stickers FROM user, user_data, bonus WHERE email = :email and user.id_user_data=user_data.id_user_data and user.id_bonus=bonus.id_bonus
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $points = $stmt->fetch(PDO::FETCH_ASSOC);
        $val = [$points['points'], $points['parking_time'], $points['public_transport'], $points['stickers']];
        return json_encode($val);
    }

    public function getBonus(string $email, string $bonusName)
    {
        if ($bonusName == 'parking') {
            $stmt = $this->database->connect()->prepare("
            CALL addParking('$email')
            ");
            $stmt->execute();
        } elseif ($bonusName == 'ticket') {
            $stmt = $this->database->connect()->prepare("
            CALL addPublicTransport('$email')
            ");
            $stmt->execute();
        } elseif ($bonusName == 'sticker') {
            $stmt = $this->database->connect()->prepare("
            CALL addStickers('$email')
            ");
            $stmt->execute();
        }
        return $this->getPoints($email);
    }

}