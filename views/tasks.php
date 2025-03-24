<!DOCTYPE html>
<html lang="en">

<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body class="d-flex justify-content-center  mt-5 ">
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

                        <button class="btn btn-danger btn-sm ms-2 deleteBtn" title="Delete task" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                            🗑
                        </button>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this task?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/task.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>