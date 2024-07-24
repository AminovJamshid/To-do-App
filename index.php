<?php

require_once "vendor/autoload.php";
require "src/Task.php";

date_default_timezone_set('Asia/Tashkent');

$update = json_decode(file_get_contents('php://input'));
$task = new Task();

require 'API.php';


if (isset($update)) {
    require 'bot/bot.php';
    return;
}


if (count($_GET) > 0 || count($_POST) > 0) {
    $task = new Task();

    if (isset($_POST['text'])) {
        $task->add($_POST['text']);
    }

    if (isset($_GET['complete'])) {
        $task->complete($_GET['complete']);
    }

    if (isset($_GET['uncompleted'])) {
        $task->uncompleted($_GET['uncompleted']);
    }

    if (isset($_GET['delete'])) {
        $task->delete($_GET['delete']);
    }
}

require 'view/home.php';