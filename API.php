<?php

if (isset($update)){
    if(isset($update->update_id)){
        // Do something if needed
    }

    $path = parse_url($_SERVER['REQUEST_URI'])['path'];

    if ($path == '/add') {
        $task->add($update->text, $update->userId);
    }
    if ($path == '/delete') {
        $task->delete($update->task_id);
    }
    if ($path == '/complete') {
        $task->complete($update->task_id);
    } elseif ($path == '/uncompleted') {
        $task->uncompleted($update->task_id);
    }
    if ($path == '/all') {
        echo json_encode($task->getAll());
        return;
    }
}
?>
