<?php
require_once 'app\models\platos.model.php';
require_once 'app\views\json.view.php';

class PlatosApiController{
    private $model;
    private $view;
    public function __construct() {
        $this->model = new PlatosModel();
        $this->view = new JSONView();
    }
    public function getAll($req, $res) {
        $filtrarCategoria = null;
        // obtengo las tareas de la DB
        if(isset($req->query->filtrarCategoria)) {
            $filtrarCategoria = $req->query->filtrarCategoria;
        }
        
        $orderBy = false;
        if(isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;

        $platos = $this->model->getPlatos($filtrarCategoria,$orderBy );
        return $this->view->response($platos);
    }
    public function getById($req, $res) {
        $id=$req->params->id;
        // obtengo las tareas de la DB
        $plato=$this->model->getPlato($id);
        if(!$plato) {
            return $this->view->response("La tarea con el id=$id no existe", 404);
        }
    
        return $this->view->response($plato);
    }

}