<?php
require_once('./controllers/Autoload.php');

class UsuarioModel extends Model{
    public $titulo_producto;
    public $descripcion;
    public $imagen;

    public function __construct()
    {
        $this->db_name='mercado';
    }
    
    public function create( $usuario_data = array() ){

        foreach ($usuario_data as $key => $value) {
            $$key=$value;
        }
        $this->query = "INSERT INTO `mercado`.`usuario` SET 
        nombre = '$nombre',
        apellido_paterno = '$apellido_paterno',
        apellido_materno = '$apellido_materno',
        correo = '$correo',
        contrasenia = MD5('$contrasenia'),
        telefono = '$telefono',
        es_empleado = '$es_empleado',
        id_empleado = '$id_empleado',
        nacimiento = '$nacimiento';
        ";
        $this->set_query();
    }
    
    public function read($id_usuario = ''){

        $this->query = ($id_usuario != '') 
        ? "SELECT * FROM  `mercado`.`usuario` WHERE id_usuario = '$id_usuario';" 
        : "SELECT * FROM  `mercado`.`usuario`;";
        
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
        $this->query = "UPDATE `mercado`.`usuario` SET 
        nombre = '$nombre',
        apellido_paterno = '$apellido_paterno',
        apellido_materno = '$apellido_materno',
        correo = '$correo',
        contrasenia = MD5('$contrasenia'),
        telefono = '$telefono',
        es_empleado = '$es_empleado',
        id_empleado = '$id_empleado',
        nacimiento = '$nacimiento'
        WHERE
        id_usuario= '$id_usuario';
        ";
        $this->set_query();
    }
    
    public function delete($id_usuario = ''){
        $this->query = "DELETE FROM
        `mercado`.`usuario`
        WHERE
            id_usuario= '$id_usuario';
        ";
        $this->set_query();
    }
    
    public function validar_usuario($correo, $contrasenia){
        $this->query = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasenia = MD5('$contrasenia');";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data; 

    }

    public function __destruct()
    {
         
    }
}