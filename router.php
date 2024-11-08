<?php
    require_once 'libs/router.php';
    require_once 'app\controllers\platos.controller.php';

    $router = new Router();
    #                 endpoint        verbo                 controller              metodo
    $router->addRoute('platos', 'GET', 'PlatosApiController', 'getAll');//lista coleccion de entidades
    $router->addRoute('platos/:id', 'GET', 'PlatosApiController', 'getById');
    $router->addRoute('platos', 'POST', 'PlatosApiController', 'create');// lista las entidades por id

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);