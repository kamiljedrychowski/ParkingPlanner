<?php

require_once('AppController.php');
require_once __DIR__.'//..//Models//Post.php';
require_once __DIR__.'//..//Database.php';

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
}