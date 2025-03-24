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
                    $(`li[data-id='${taskId}'] .task-title`).addClass('text-success fw-bold');
                    setTimeout(function(){
                        $(`li[data-id='${taskId}'] .task-title`).removeClass('text-success fw-bold');
                    },3000);
                    isEditing = false;
                } else {
                    $("#taskList").append(response); 
                    setTimeout(function () {
                        $("#taskList li:last").removeClass("bg-success");
                    }, 1000);
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

    
    
            // delete a task
    let deleteTaskId = null;
    $(document).on("click", ".deleteBtn", function () {
        deleteTaskId = $(this).closest("li").data("id");
        $("#deleteConfirmModal").modal("show");
    });

    // Confirm Delete
    $("#confirmDelete").click(function () {
        if (deleteTaskId) {
            $.ajax({
                url: "/deleteTask",
                type: "POST",
                data: { 
                    action: "delete",
                    id: deleteTaskId 
                },
                success: function () {
                    $(`li[data-id='${deleteTaskId}']`).fadeOut(300, function () { $(this).remove(); });
                    $("#deleteConfirmModal").modal("hide");
                },
                error: function () {
                    alert("Failed to delete task.");
                }
            });
        }
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

