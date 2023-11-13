<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'app/models/bebida.model.php';

    class TaskApiController extends ApiController {
        private $model;
    
        function __construct() {
            parent::__construct();
            $this->model = new TaskModel();
        }

        public function get($params = []){
            if(isset($_GET['order']) && isset($_GET['sort'])){
                $order = $_GET['order'];
                $sort = $_GET['sort'];
                $productos = $this->model->getTaskordenados($order, $sort);
                if($productos){
                    $this->view->response($productos, 200);
                } else {
                    $this->view->response('Error, no se han podido obtener los productos', 500);
                } 
            } else if(isset($_GET['precio'])){
                $precio = $_GET['precio'];
                $productos = $this->model->getTaskDeterminadoPrecio($precio);
                if($productos){
                    $this->view->response($productos, 200);
                } else {
                    $this->view->response('No existen productos con dicho precio', 404);
                }
            }   else if($_GET != ['precio'] ||$_GET != ['order'] || $_GET != ['sort']){
                $this->view->response('no existe el campo enviado, envíe un campo válido', 404);
            } else{
                $productos = $this->model->getTasks();
                if($productos){
                    $this->view->response($productos, 200);
                } else {
                    $this->view->response('Error', 404);
                }
            }
        }
    


        public function getId($params = []){
            $id = $params[':ID'];
            $productoId = $this->model->getTaskId($id);
          if($productoId){
             $this->view->response($productoId, 200);  
        } else {
             $this->view->response('No existe el producto con dicho id', 404);
        }
       }

    

        public function delete($params = []) {
            $id = $params[':ID'];
            $tarea = $this->model->getTaskId($id);

            if($tarea) {
                $this->model->deleteTask($id);
                $this->view->response('La bebida con id='.$id.' ha sido borrada.', 200);
            } else {
                $this->view->response('La bebida con id='.$id.' no existe.', 404);
            }
        }

        public function create($params = []) {
            $body = $this->getData();

            $nombre = $body->nombre;
            $tipo = $body->tipo;
            $precio = $body->precio;

            if (empty($nombre) || empty($tipo)) {
                $this->view->response("Complete los datos", 400);
            } else {
                $id = $this->model->insertTask($nombre, $tipo, $precio);

                $tarea = $this->model->getTaskId($id);
                $this->view->response($tarea, 201);
            }
    
        }

        public function update($params = []) {
            $id = $params[':ID'];
            $tarea = $this->model->getTaskId($id);

            if($tarea) {
                $body = $this->getData();
                $nombre = $body->nombre;
                $tipo = $body->tipo;
                $precio = $body->precio;
                $this->model->updateTaskData($id, $nombre, $tipo, $precio);

                $this->view->response('La bebida con id='.$id.' ha sido modificada.', 200);
            } else {
                $this->view->response('La bebida con id='.$id.' no existe.', 404);
            }
        }
      }
    