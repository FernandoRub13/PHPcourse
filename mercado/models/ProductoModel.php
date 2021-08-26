<?php
require_once('./controllers/Autoload.php');

class ProductoModel extends Model{
    public $titulo_producto;
    public $descripcion;
    public $imagen;

    public function __construct()
    {
        $this->db_name='mercado';
    }
    
    public function create( $producto_data = array() ){

        foreach ($producto_data as $key => $value) {
            $$key=$value;
        }
        $this->query = "INSERT INTO `mercado`.`producto` SET 
        titulo_producto='$titulo_producto', 
        descripcion='$descripcion',
         imagen='$imagen', 
         precio='$precio',
         id_usuario='$id_usuario';
        ";
        $this->set_query();
    }
    
    public function read($id_producto = ''){

        $this->query = ($id_producto != '') 
        ? "SELECT * FROM  `mercado`.`producto` WHERE id_producto = '$id_producto';" 
        : "SELECT * FROM  `mercado`.`producto`;";
        
        $this->get_query();
        // var_dump($this->rows);
        // print_r($this->rows);
        // return $this->rows;
        $num_rows = count($this->rows);
        // echo $num_rows;
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
        
    }
    public function read_by_usuario($id_usuario = ''){

        $this->query = ($id_usuario != '') 
        ? "SELECT * FROM  `mercado`.`producto` WHERE id_usuario = '$id_usuario';" 
        : "SELECT * FROM  `mercado`.`producto`;";
        
        $this->get_query();
        // var_dump($this->rows);
        // print_r($this->rows);
        // return $this->rows;
        $num_rows = count($this->rows);
        // echo $num_rows;
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
        
    }
    
    public function update($producto_data = array()){
        foreach ($producto_data as $key => $value) {
            $$key=$value;
        }
        $this->query = "UPDATE `mercado`.`producto` SET 
        titulo_producto='$titulo_producto', 
        descripcion='$descripcion',
         imagen='$imagen', 
         precio='$precio',
         id_usuario='$id_usuario';
         WHERE
        id_producto= '$id_producto';
        ";
        $this->set_query();
    }
    
    public function delete($id_producto = ''){
        $this->query = "DELETE FROM
        `mercado`.`producto`
        WHERE
            id_producto= '$id_producto';
        ";
        $this->set_query();
    }
    
    public function __destruct()
    {
         
    }
}