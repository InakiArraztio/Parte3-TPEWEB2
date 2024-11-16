<?php
    require_once 'libs/router.php';
    require_once 'app\controllers\platos.controller.php';
    require_once 'app/controllers/user.api.controller.php';
    require_once 'app/middlewares/jwt.auth.middleware.php';

    $router = new Router();
    $router->addMiddleware(new JWTAuthMiddleware());
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

    $router->addRoute('usuarios/token'    ,            'GET',     'UserApiController',   'getToken');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);