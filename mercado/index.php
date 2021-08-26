<?php
require_once('./controllers/Autoload.php');
$autoload = new Autoload();
$route = isset($_GET['r']) ? $_GET['r'] : 'home'; 
$mercado  = new Router($route);
$a = new ProductoModel();


