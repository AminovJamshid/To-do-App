<?php

declare(strict_types=1);

$num    = new Task(); // FIXME: Variable name collision
$todoList = $num->getAll();

$todoList = json_decode(json_encode($todoList), true);
?>

<div class="list-group list-group-flush">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
    <?php
    foreach ($todoList as $task) {
        $checked = $task['status'] ? 'checked' : '';
        $strike  = $task['status'] ? ' text-decoration-line-through' : '';
        $action  = $task['status'] ? 'uncompleted' : 'complete';
        echo "<div class='d-flex list-group-item'>";
        echo "    <a href='?$action={$task['id']}' class='w-100 text-decoration-none text-dark'>";
        echo "        <input class='form-check-input me-1' type='checkbox' id='task-{$task['id']}' $checked>";
        echo "        <label class='form-check-label $strike' for='task-{$task['id']}'>{$task['text']}</label>";
        echo "    </a>";
        echo "    <a href='?delete={$task['id']}' type='button' class='p-2'><i class='fa-solid fa-trash text-danger'></i></a>";
        echo "</div>";
    } ?>
</div>