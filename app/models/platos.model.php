<?php
class PlatosModel{
    private $db;

    public function __construct() {
        $this->db = $this->connectionDb();
    }
    private function connectionDb(){
        return new PDO('mysql:host=localhost;dbname=restaurante;charset=utf8', 'root', '');
     }

    public function getPlatos($filtrarCateogria = null, $orderBy = false,$order = false) {
        $sql = 'SELECT * FROM platos';
        if($filtrarCateogria!= null) {
            
                $sql .= ' WHERE id_categoria = '.$filtrarCateogria;
           
        }
        if($orderBy) {
            switch($orderBy) {
                case 'nombre':
                    $sql .= ' ORDER BY nombre_plato';
                    break;
                case 'precio':
                    $sql .= ' ORDER BY precio';
                    break;
            }
        }
        if($order) {
            switch($order) {
                case 'ascendente':
                    $sql .= ' ASC';
                    break;
                case 'descendente':
                    $sql .= ' DESC';
                    break;
            }
        }

        // 2. Ejecuto la consulta
        $query = $this->db->prepare($sql);
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $tasks;
    }
    function getPlato($id) {
        $query = $this->db->prepare('SELECT * FROM platos WHERE id_plato = ?');
    
        
        $query->execute([$id]);
    
        $platos = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $platos;
    }
    function insertarPlato($nombre, $precio, $categoria){
        $query = $this->db->prepare('INSERT INTO platos (nombre_plato, precio, id_categoria) VALUES (?,?,?)'); 
        $query->execute([$nombre, $precio, $categoria]);
        return $this->db->lastInsertId();
    }
    function borrarPlato($id) {
        $query = $this->db->prepare('DELETE FROM platos WHERE id_plato = ?');
        $query->execute([$id]);
    }
    function editarPlato($id,$nombre,$precio,$cat){
        $query = $this->db->prepare('UPDATE platos SET nombre_plato = ?, precio = ?, id_categoria = ? WHERE id_plato = ?');
        $query->execute([$id,$nombre, $precio, $cat]);
    }
}