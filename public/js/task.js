$(document).ready(function () {
   
    let isEditing = false; 
        //add and edit task
    $("#taskForm").submit(function (e) {
        e.preventDefault();
        let taskTitle = $("#taskInput").val().trim();
        let taskId = $("#taskId").val();

        if (taskTitle === "") {
            $("#error").fadeIn();
            $("#error").fadeOut(3000);
            return;
        }
        
        let actionUrl = isEditing ? "/editTask" : "/addTask";
        let requestData = isEditing ? { action: "edit", id: taskId, task: taskTitle } : { action: "add", task: taskTitle };
        
        $.ajax({
            url: actionUrl,
            type: "POST",
            data: requestData,
            success: function (response) {
                if (isEditing) {
                    $(`li[data-id='${taskId}'] .task-title`).text(taskTitle);
                    isEditing = false;
                } else {
                    $("#taskList").append(response); 
                }
                $("#taskInput").val(""); 
                $("#taskId").val(""); 
                $("button[type='submit']").text("Add"); 
            }
        });
    });

    $(document).on("click", ".editBtn", function () {
        let li = $(this).closest("li");
        let id = li.data("id");
        let title = li.find(".task-title").text();

        $("#taskInput").val(title); 
        $("#taskId").val(id); 
        $("button[type='submit']").text("Update");
        isEditing = true;
    });

    // Delete Task
    $(document).on("click", ".deleteBtn", function () {
        let li = $(this).closest("li");
        let id = li.data("id");

        $.ajax({
            url: "/deleteTask",
            type: "POST",
            data: { 
                action: "delete",
                id: id 
            },
            success: function () {
                li.fadeOut(300, function () {
                    $(this).remove();
                });
            }
        });
    });

    // Complete Task
    $(document).on("change", ".taskCheckbox", function () {
        let li = $(this).closest("li");
        let id = li.data("id");
        let completed = $(this).is(":checked") ? 1 : 0;

        $.ajax({
            url: "/completeTask",
            type: "POST",
            data: { 
                action: "complete",
                id: id,
                status: completed
            },
            success: function () {
                li.toggleClass("list-group-item-success");
            }
        });
    });

});

