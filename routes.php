<?php

$routes =  [
    ['method' => 'GET', 'url' => '/', 'controller' => 'AllTasksController', 'function' => 'showAlltasks'],
    ['method' => 'GET', 'url' => '/tasks', 'controller' => 'AllTasksController', 'function' => 'showAlltasks'],
    ['method' => 'GET', 'url' => '/addTask', 'controller' => 'AddTaskController', 'function' => 'addTask'],
    ['method' => 'POST', 'url' => '/addTask', 'controller' => 'AddTaskController', 'function' => 'addTask'],
    ['method' => 'POST', 'url' => '/editTask', 'controller' => 'EditTaskController', 'function' => 'editTask'],
    ['method' => 'POST', 'url' => '/deleteTask', 'controller' => 'DeleteTaskController', 'function' => 'deleteTask'],
    ['method' => 'POST', 'url' => '/completeTask', 'controller' => 'CompleteTaskController', 'function' => 'completeTask']
];
