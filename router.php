<?php
    require_once 'libs/router.php';
    require_once 'app\controllers\platos.controller.php';

    $router = new Router();
    #                 endpoint        verbo            controller              metodo
    #GET
    $router->addRoute('platos',        'GET',          'PlatosApiController', 'getAll');//lista coleccion de entidades
    $router->addRoute('platos/:id',    'GET',          'PlatosApiController', 'getById');


    #POST
    $router->addRoute('platos',        'POST',         'PlatosApiController', 'create');// lista las entidades por id

    #PUT 
    $router->addRoute('platos/:id',    'PUT',           'PlatosApiController', 'update'); //editar plato por id

    #DELETE
    $router->addRoute('platos/:id',     'DELETE',       'PlatosApiController',  'eliminar'); //elimino un plato por id


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);