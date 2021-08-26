<?php
if ($_POST['r'] == 'agregar-producto' && !isset($_POST['crud']) ) {
    print('
    <h2>Agregar producto</h2>
    <div class="container  col-sm-6">
    <form method="POST" >
        
        <label for="nombre" class="form-label">Introduce los datos de tu producto.</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Nombre</span>
            <input type="text" name="titulo_producto" class="form-control" id="nombre" aria-describedby="basic-addon3" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Precio</span>
            <input type="number" name="precio" class="form-control" id="" aria-describedby="basic-addon3" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">URL de la imagen del producto</span>
            <input type="text" name="imagen" class="form-control" id="" aria-describedby="basic-addon3" required>
        </div>
        <div class="input-group">
            <span class="input-group-text">Descripcio del producto</span>
            <textarea name="descripcion"class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div class="m-3">
            <input class="btn btn-success" type="submit" Value="Agregar">
            <input type="hidden" name="r" value="agregar-producto">
            <input type="hidden" name="crud" value="create">
        </div>
    </form>
    </div>
    ');
}elseif ($_POST['r'] == 'agregar-producto' && $_POST['crud'] == 'create' ) {
    $producto_controller = new ProductoController();

    $nuevo_producto = array(
        'titulo_producto'=>$_POST['titulo_producto'],
        'descripcion'=>$_POST['descripcion'],
        'precio'=>$_POST['precio'],
        'imagen'=>$_POST['imagen'],
        'id_usuario'=>$_SESSION['id_usuario']
    );

    $producto = $producto_controller->create($nuevo_producto);
    $template= '
    <div class="container card bg-success center-elm">
        <p >Producto <b>%s</b> creado.</p>
    </div>
    <script>
        window.onload() = function(){
            reloadPage("misProductos");
        }
    </script>
    ';
    printf($template, $_POST['titulo_producto']);
}else {
    print('
    <div class="container card bg-danger center-elm">
        <p >Sitio prohibido</p>
    </div>
    ');
}
