<?php

global $pdo;
include 'db.php';
$stmt = $pdo->query('SELECT * FROM tasks');
$tasks = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Todo List</h1>
<a href="add_task.php">Add Task</a>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <strong><?php echo htmlspecialchars($task['title']); ?></strong>
            <p><?php echo htmlspecialchars($task['description']); ?></p>
            <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
            <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
