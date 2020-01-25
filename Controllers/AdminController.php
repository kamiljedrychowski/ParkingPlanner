<?php

require_once 'AppController.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Repository/UserRepository.php';

class AdminController extends AppController
{
    public function index(): void
    {
        $user = new UserRepository();
        $this->render('admin', ['user' => $user->getActiveUser($_SESSION['email'])]);
    }

    public function users(): void
    {
        $user = new UserRepository();
        header('Content-type: application/json');
        http_response_code(200);
        echo $user->getUsers() ? json_encode($user->getUsers()) : '';
    }
    public function userDelete(): void
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }
        $user = new UserRepository();
        $user->delete((int)$_POST['id']);
        http_response_code(200);
    }


}