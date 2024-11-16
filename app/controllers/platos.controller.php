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
        $platosPaginado=[];
        $pagina=null;
        if(isset($req->query->pagina)){
            $pagina=$req->query->pagina;
            $limite=5;
            if($pagina==1){
                $paginaContador=0;
            }else{
                $i=$pagina-1;
                $paginaContador=$limite*$i;
            }
            $limite*=$pagina;
            if($limite>count($platos)){
                $limite=1-count($platos);
            }

            
           for($i=$paginaContador;$i<$limite;$i++){
                $platosPaginado[]=$platos[$i];

           }
           if(count($platosPaginado)>0){
                return $this->view->response($platosPaginado);
           }else{
                return $this->view->response("La pagina $pagina  no existe", 404);
           }
           

        }

        


        return $this->view->response($platos);
    }
    
    public function getById($req, $res) {
        $id=$req->params->id;
        // obtengo las tareas de la DB
        $plato=$this->model->getPlato($id);
        if(!$plato) {
            return $this->view->response("el plato con el id=$id no existe", 404);
        }
    
        return $this->view->response($plato);
    }

    public function create($req, $res) {

        // valido los datos
        if (empty($req->body->nombre_plato) || empty($req->body->precio)|| empty($req->body->id_categoria)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $nombre = $req->body->nombre_plato;     
        $precio = $req->body->precio;          
        $cat=$req->body->id_categoria;
        // inserto los datos
        $id = $this->model->insertarPlato($nombre, $precio,$cat );

        if (!$id) {
            return $this->view->response("Error al insertar plato", 500);
        }

        // buena práctica es devolver el recurso insertado
        $plato = $this->model->getPlato($id);
        return $this->view->response($plato, 201);
    }

    public function eliminar($req, $res) {
        $id = $req->params->id;
        $plato = $this->model->getPlato($id);
        
        if(!$plato) {
            return $this->view->response("El plato con el id=$id no exite", 404);
        }

        $this->model->borrarPlato($id);
        $this->view->response("El plato con el id=$id se elimino con exito");
    }

    public function update($req, $res) {
        $id = $req->params->id;

        $plato = $this->model->getPlato($id);

        if(!$plato){
            return $this->view->response("El plato con el id=$id no existe", 404);
        }

        //valido los datos
        if(empty($req->body->nombre_plato) || empty($req->body->precio) || empty($req->body->id_categoria)){
            return $this->view->response('Faltan completar datos', 400);
        }

        //obtengo los datos
        $nombre = $req->body->nombre_plato;     
        $precio = $req->body->precio;          
        $cat=$req->body->id_categoria;

        //actualizo el plato
        $this->model->editarPlato($id,$nombre,$precio,$cat);

        //obtengo el plato modificado y lo devuevlo en la respuesta
        $plato = $this->model->getPlato($id);
        $this->view->response($plato, 200);
    }
}