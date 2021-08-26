<?php
require_once('./controllers/Autoload.php');

class ProductoController
{
    private $model;

    public function __construct(){
        $this->model = new ProductoModel();
    }

    public function create($producto_data = array()){
        return $this->model->create($producto_data); 
    }
    public function read($id_producto = ''){
        return $this->model->read($id_producto); 
    }
    public function read_by_usuario($id_usuario = ''){
        return $this->model->read_by_usuario($id_usuario); 
    }
    public function update($producto_data = array()){
        return $this->model->update($producto_data); 
    }
    public function delete($id_producto = ''){
        return $this->model->delete($id_producto); 
    }
    public function __destruct()
    {
        
    }
}
