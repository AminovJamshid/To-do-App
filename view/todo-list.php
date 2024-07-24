<?php

declare(strict_types=1);

$task     = new Task(); // FIXME: Variable name collision
$todoList = $task->getAll();
?>

<div class="list-group list-group-flush">
    <?php
    foreach ($todoList as $task) {
        $checked = $task['status'] ? 'checked' : '';
        $strike  = $task['status'] ? ' text-decoration-line-through' : '';
        $action  = $task['status'] ? 'uncompleted' : 'complete';
        echo "<div class='d-flex list-group-item'>";
        echo "{$task['id']}";
        echo "    <a href='?$action={$task['id']}' class='w-100 text-decoration-none text-dark'>";
        echo "        <input class='form-check-input me-1' type='checkbox' id='task-{$task['id']}' $checked>";
        echo "        <label class='form-check-label $strike' for='task-{$task['id']}'>{$task['text']}</label>";
        echo "    </a>";
        echo "    <a href='?delete={$task['id']}' type='button' class='p-2'><i class='fa-solid fa-trash text-danger'></i></a>";
        echo "</div>";
    } ?>
</div>