<?php
require_once('./controllers/Autoload.php');
class Router
{
    public $route;
    public function __construct($route)
    {
        if (!isset($_SESSION))
            session_start([
                'use_only_cookies' => 1,
                'auto_start' => 1,
                'read_and_close' => true
            ]);


        if (!isset($_SESSION['session']))
            $_SESSION['session'] = false;


        if ($_SESSION['session']) {
            //Aquí va toda la programación de la web App
            $controller = new ViewController();
            $this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
            switch ($route) {
                case 'home':
                    if (!$_SESSION['es_empleado']) {
                        $controller->load_view('home');
                    } else {
                        $controller->load_view_as_admin('home');
                    }
                    break;
                case 'misProductos':
                    if (!$_SESSION['es_empleado']) {
                        if (!isset($_POST['r'])) {
                            $controller->load_view('misProductos');
                        } else if ($_POST['r'] == 'agregar-producto') {
                            $controller->load_view('agregar-producto');
                        }else if ($_POST['r'] == 'editar-producto'){
                            $controller->load_view('editar-producto');
                        }else if ($_POST['r'] == 'eliminar-producto') {
                            $controller->load_view('eliminar-producto');
                        }       
                    } else {
                        
                        if (!isset($_POST['r'])) {
                            $controller->load_view_as_admin('misProductos');
                        } else if ($_POST['r'] == 'agregar-producto') {
                            $controller->load_view_as_admin('agregar-producto');
                        }else if ($_POST['r'] == 'editar-producto'){
                            $controller->load_view_as_admin('editar-producto');
                        }else if ($_POST['r'] == 'eliminar-producto') {
                            $controller->load_view_as_admin('eliminar-producto');
                        }  
                    }

                    break;
                case 'misPedidos':
                    if (!$_SESSION['es_empleado']) {
                        $controller->load_view('misPedidos');
                    } else {
                        $controller->load_view_as_admin('misPedidos');
                    }
                    break;
                case 'administrarUsuarios':
                    if (!$_SESSION['es_empleado']) {
                        $controller->load_view('administrarUsuarios');
                    } else {
                        $controller->load_view_as_admin('administrarUsuarios');
                    }
                    break;
                case 'miCuenta':
                    if (!$_SESSION['es_empleado']) {
                        $controller->load_view('miCuenta');
                    } else {
                        $controller->load_view_as_admin('miCuenta');
                    }
                    break;
                case 'administrarProductos':
                    if (!$_SESSION['es_empleado']) {
                        $controller->load_view('administrarProductos');
                    } else {
                        $controller->load_view_as_admin('administrarProductos');
                    }
                    break;
                case 'administrarCategorias':
                    if (!$_SESSION['es_empleado']) {
                        $controller->load_view('administrarCategorias');
                    } else {
                        $controller->load_view_as_admin('administrarCategorias');
                    }
                    break;
                case 'salir':
                    $user_session = new SessionController();
                    $user_session->logout();
                    break;

                default:
                if (!$_SESSION['es_empleado']) {
                    $controller->load_view('error404');
                } else {
                    $controller->load_view_as_admin('error404');
                }
                break;
            }
        } else {
            //Mostrar un formulario de Login
            if (!isset($_POST['correo']) && !isset($_POST['contrasenia'])) {
                $login_form = new ViewController();
                $login_form->load_view_login('login');
            } else {
                $user_session = new SessionController();
                $session = $user_session->login($_POST['correo'], $_POST['contrasenia']);
                if (empty($session)) {
                    //echo 'El usuario y el password son incorrectos';
                    $controller = new ViewController();
                    $controller->load_view_login('login');
                    header('Location: ./?error=El correo o contraseña no son válidos. ');
                } else {
                    //echo 'El usuario y password son correctos';
                    // print_r($session);

                    $_SESSION['session'] = true;

                    foreach ($session as $row) {
                        $_SESSION['id_usuario'] = $row['id_usuario'];
                        $_SESSION['nombre'] = $row['nombre'];
                        $_SESSION['apellido_paterno'] = $row['apellido_paterno'];
                        $_SESSION['apellido_materno'] = $row['apellido_materno'];
                        $_SESSION['correo'] = $row['correo'];
                        $_SESSION['contrasenia'] = $row['contrasenia'];
                        $_SESSION['telefono'] = $row['telefono'];
                        $_SESSION['es_empleado'] = $row['es_empleado'];
                        $_SESSION['id_empleado'] = $row['id_empleado'];
                        $_SESSION['nacimiento'] = $row['nacimiento'];
                    }

                    header('Location: ./');
                }
            }
        }
    }
    public function __destruct()
    {
    }
}
