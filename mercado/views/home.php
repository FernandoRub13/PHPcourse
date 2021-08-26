<?php
$template = '
<article class="container tarjeta-login">
    <h2>%s, bienvenido al Mercado digital. </h2>
    <h3>Apoyando al mercado local.</h3>
    <h4>Tu cumpleaños es %s</h4>
    <p>Tu email es %s</p>
    %s

</article>
';
$isAdmin = ($_SESSION['es_empleado']) ? '<p><b>Eres ADMINISTRADOR</b></p>' : '';

printf(
    $template,
    $_SESSION['nombre'],
    $_SESSION['nacimiento'],
    $_SESSION['correo'],
    $isAdmin
);
