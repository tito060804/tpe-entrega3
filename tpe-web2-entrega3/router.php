<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    require_once 'app/controllers/task.api.controller.php';
    require_once 'app/controllers/api.controller.php';

    $router = new Router();

    #                 endpoint      verbo     controller           método
    $router->addRoute('tareas',     'GET',    'TaskApiController', 'get'   ); 
    $router->addRoute('tareas',     'POST',   'TaskApiController', 'create');
    $router->addRoute('tareas/:ID', 'GET',    'TaskApiController', 'getId');
    $router->addRoute('tareas/:ID', 'PUT',    'TaskApiController', 'update');
    $router->addRoute('tareas/:ID', 'DELETE', 'TaskApiController', 'delete');
    
    
    $router->route($_GET['resource']        , $_SERVER['REQUEST_METHOD']);