<?php
print('
<div class="container-sm center">
    <div class="row mt-5">
        <div class="card text-center tarjeta-login">
            <div class="card-header fs-2">
                Iniciar sesión.
            </div>
            <d <div class="">
                <form action="" method="post">
                    <div class="ms-5 mt-5 me-5">
                        <label for="correo-login" class="form-label fs-2">Correo electrónico:</label>
                        <input name="correo" type="email" class="form-control fs-4" id="correo-login" placeholder="ejemplo@ejemplo.com">
                    </div>
                    <div class="ms-5 mt-3 me-5">
                        <label for="contrasenia-login" class="form-label fs-2">Contaseña:</label>
                        <input name="contrasenia" type="password" class="form-control fs-4" id="contrasenia-login" placeholder="••••••••••••">
                    </div>


');

if (isset($_GET['error'])) {
    $template = '
    <div class="container text-center ">
        <p class="item error">%s</p>
    </div>

    ';
    printf($template, $_GET['error']);
}

print('
<div class="ms-5 mt-4 me-5 mb-5">
<input type="submit" class="form-control fs-4 btn btn-primary" id="enviar-login" value="Ingresar">
</div>
</form>
</div>
</div>

</div>
');