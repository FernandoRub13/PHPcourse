<?php
class SessionController{
    private $session;

    public function __construct()
    {
        $this->session = new UsuarioModel();
    }
    public function login($correo, $contrasenia){
        return $this->session->validar_usuario($correo, $contrasenia);
    }
    public function logout(){
        session_start();
        session_destroy();
        header('Location: ./');
    }
    public function __destruct()
    {
        
    }
}