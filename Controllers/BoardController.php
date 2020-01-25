<?php

require_once('AppController.php');
require_once __DIR__ . '//..//Database.php';
require_once __DIR__ . '//..//Repository//UserRepository.php';

class BoardController extends AppController
{

    public function start()
    {
        $this->render('board');
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
        $var = json_decode($user->getPoints((string)$_POST['mail']));

        if ($_POST['bonusName'] == 'parking') {
            if ($var[0] < 30) {
                echo '[]';
                return;
            }
        } elseif ($_POST['bonusName'] == 'ticket') {
            if ($var[0] < 15) {
                echo '[]';
                return;
            }
        } elseif ($_POST['bonusName'] == 'sticker') {
            if ($var[0] < 50) {
                echo '[]';
                return;
            }
        }

        $user = new UserRepository();
        $temp = $user->getBonus((string)$_POST['mail'], (string)$_POST['bonusName']);

        http_response_code(200);
        echo $temp;
    }
}