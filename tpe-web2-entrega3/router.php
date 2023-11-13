<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    require_once 'app/controllers/task.api.controller.php';
    require_once 'app/controllers/api.controller.php';

    $router = new Router();

    #                 endpoint      verbo     controller           método
    $router->addRoute('bebida',     'GET',    'TaskApiController', 'get'   ); 
    $router->addRoute('bebida',     'POST',   'TaskApiController', 'create');
    $router->addRoute('bebida/:ID', 'GET',    'TaskApiController', 'getId');
    $router->addRoute('bebida/:ID', 'PUT',    'TaskApiController', 'update');
    $router->addRoute('bebida/:ID', 'DELETE', 'TaskApiController', 'delete');
    
    
    $router->route($_GET['resource']        , $_SERVER['REQUEST_METHOD']);