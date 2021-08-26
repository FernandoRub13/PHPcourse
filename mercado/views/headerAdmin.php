<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Este es un mercado dgital">


    <!-- <link rel="stylesheet" href="./public/css/responsimple.min.css"> -->
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/mercado.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado</title>
</head>

<body >

<nav class="navbar navbar-expand-lg navbar-dark  bg-gradient">
  <div class="container-fluid">
    <a class="navbar-brand" href="home"><img src="./public/img/miMercado.png" alt="Mercado" width="30" height="24"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="misProductos">Mis productos</a>
        </li>
        
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Más
          </a>
          <ul class="dropdown-menu bg-gradient" aria-labelledby="navbarDropdown">
            <!-- <li><a class="dropdown-item" href="misProductos">Mis productos</a></li> -->
            <li><a class="dropdown-item" href="misPedidos">Mis pedidos</a></li>
            <li><a class="dropdown-item" href="miCuenta">Mi cuenta</a></li>
            <li><a class="dropdown-item" href="administrarUsuarios">Administrar usuarios</a></li>
            <li><a class="dropdown-item" href="administrarProductos">Administrar productos</a></li>
            <li><a class="dropdown-item" href="administrarCategorias">Administrar categorias</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="salir">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>