<!DOCTYPE html>
<html lang="en">
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
   
</head>
<body class="d-flex justify-content-center  mt-5 " >
    <div class="todo-container w-50">
        <h2 class="text-center">To-Do List</h2>

        <!-- Task Form -->
        <form id="taskForm" class="d-flex mb-3">
            <input type="hidden" id="taskId" value="">
            <input type="text" id="taskInput" class="form-control me-2" placeholder="New Task">
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <p><span id="error" class="error-text">Task cannot be empty!</span></p>

        <!-- Task List -->
        <ul id="taskList" class="list-group">
            <?php foreach ($tasks as $task) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center <?= $task['status'] == 'completed' ? 'list-group-item-success' : '' ?>" data-id="<?= $task['id'] ?>">
                    <input type="checkbox" class="taskCheckbox form-check-input h2" <?= $task['status'] == 'completed' ? 'checked' : '' ?>>
                    <span class="task-title ms-3"><?= htmlspecialchars($task['title']) ?></span>
                    
                    <div>
                        <button class="btn btn-warning btn-sm editBtn" title="Edit task">✏</button>

                        <button class="btn btn-danger btn-sm ms-2 deleteBtn" title="Delete task">🗑</button>
                    </div>
                </li>
            <?php } ?>  
        </ul>
    </div>
    
    <script src="/js/task.js"></script>
</body>
</html>
