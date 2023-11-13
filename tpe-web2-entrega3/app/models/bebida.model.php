<?php
    
require_once 'app/models/model.php';

class TaskModel  extends Model {  
    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getTasks() {
        $query = $this->db->prepare('SELECT * FROM bebidas');
        $query->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);
        return $tasks;
    }

    public function getTaskId($id){
        $query = $this->db->prepare('SELECT * FROM bebidas WHERE id = ?');
        $query->execute([$id]);
        $bebida = $query->fetch(PDO::FETCH_OBJ);
        return $bebida;
    }

    public function getTaskOrdenados($order, $sort){
        $query = $this->db->prepare("SELECT * FROM bebidas ORDER BY $sort $order");
        $query->execute();
        $bebida = $query->fetchAll(PDO::FETCH_OBJ);
        return $bebida;
    }

    public function getTaskDeterminadoPrecio($precio){
        $query = $this->db->prepare('SELECT * FROM bebidas WHERE precio = ?');
        $query->execute([$precio]);
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }


     /**
     * Inserta la tarea en la base de datos
     */
    public function insertTask($nombre, $tipo, $precio) {
        $query = $this->db->prepare('INSERT INTO bebidas (nombre, tipo, precio) VALUES(?,?,?)');
        $query->execute([$nombre, $tipo, $precio]);

        return $this->db->lastInsertId();
    }
    
    public function deleteTask($id) {
        $query = $this->db->prepare('DELETE FROM bebidas WHERE id = ?');
        $query->execute([$id]);
    }

    public function updateTask($id) {    
        $query = $this->db->prepare('UPDATE bebidas SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
    }

    public function updateTaskData($id, $nombre, $tipo, $precio) {    
        $query = $this->db->prepare('UPDATE beidas SET nombre = ?, tipo = ?, precio = ? WHERE id = ?');
        $query->execute([$nombre, $tipo, $precio, $id]);
    }
}