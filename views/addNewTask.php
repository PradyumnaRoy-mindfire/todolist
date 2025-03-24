<li class="list-group-item d-flex justify-content-between align-items-center bg-success" data-id="<?= $taskId ?>">
    <input type="checkbox" class="taskCheckbox form-check-input h2">
    <span class="task-title ms-3"> <?= htmlspecialchars($taskTitle)?></span>
    <div>
        <button class="btn btn-warning btn-sm editBtn">✏</button>
        <button class="btn btn-danger btn-sm ms-2 deleteBtn">🗑</button>
    </div>
</li>