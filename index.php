<?php

require_once "vendor/autoload.php";
ini_set('display_errors', 1);
if (count($_GET) > 0 || count($_POST) > 0) {
    $task = new \home\PhpstormProjects\To-do_app\src\Task();

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