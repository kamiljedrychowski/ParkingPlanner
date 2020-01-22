<?php

require_once('AppController.php');
require_once __DIR__.'//..//Models//Post.php';
require_once __DIR__.'//..//Database.php';
require_once __DIR__ . '//..//Repository//UserRepository.php';

class BoardController extends AppController
{

    public function getMap()
    {
        $database = new Database();
        $database->connect();

        $post1 = new Post('mainMap.svg');

        $data = [$post1];
        $this->render('board', ['posts' => $data]);
    }

    public function getpointss()
    {
        if (!isset($_POST['mail'])) {
            http_response_code(404);
            return;
        }

        $user = new UserRepository();
        $temp = $user->getPoints((string)$_POST['mail']);
        http_response_code(200);
            echo $temp;
    }

    public function getbonuss()
    {
        if (!isset($_POST['mail']) and !isset($_POST['bonusName'])) {
            http_response_code(404);
            return;
        }
        $user = new UserRepository();
        $var = $user->getPoints((string)$_POST['mail']);

        if($_POST['bonusName'] == 'parking'){
            if($var<30)
            {
                return;
            }
        }
        elseif ($_POST['bonusName'] == 'ticket'){
            if($var<15)
            {
                return;
            }
        }
        elseif ($_POST['bonusName'] == 'sticker'){
            if($var<50)
            {
                return;
            }
        }

        $user = new UserRepository();
        $temp = $user->getBonus((string)$_POST['mail'], (string)$_POST['bonusName']);

        http_response_code(200);
        echo $temp;
    }
}