<?php

require_once 'AppController.php';
require_once __DIR__ . '//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class SecurityController extends AppController
{

    public function login()
    {
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $userRepository->getUser($email);

            if ($user->getEmail() !== $email) {
                $this->render('login', ['messages' => ['User with this email not exist!']]);
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('login', ['messages' => ['Wrong password!']]);
                return;
            }
            $_SESSION["id"] = $user->getId();
            $_SESSION["email"] = $user->getEmail();
            $_SESSION["role"] = $user->getRole();
            $_SESSION["name"] = $user->getName();
            $_SESSION["surname"] = $user->getSurname();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }


        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }

//    public function register()
//    {
//        $userRepository = new UserRepository();
//
//        if ($this->isPost()) {
//            $email = $_POST['email'];
//            $password1 = $_POST['password1'];
//            $password2 = $_POST['password2'];
//            $name = $_POST['name'];
//            $surname = $_POST['surname'];
//
//            if ($password1 !== $password2){
//                $this->render('register', ['messages' => ['Password are not same']]);
//                return;
//            }
//
//            $user = $userRepository->addUser($email, $password1, $name, $surname);
//
//            if (!$user) {
//                $this->render('register', ['messages' => ['User with this email not exist!']]);
//                return;
//            }
//
//
//            $_SESSION["id"] = $user->getEmail();
//            $_SESSION["role"] = $user->getRole();
//            $_SESSION["name"] = $user->getName();
//            $_SESSION["surname"] = $user->getSurname();
//
//            $url = "http://$_SERVER[HTTP_HOST]/";
//            header("Location: {$url}?page=board");
//            return;
//        }
//
//        $this->render('register');
//    }

}