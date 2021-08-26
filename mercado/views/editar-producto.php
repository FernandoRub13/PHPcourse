<?php
$producto_controller = new ProductoController();

if ($_POST['r'] == 'editar-producto' && !isset($_POST['crud'])) {

  
        $producto = $producto_controller->read($_POST['id_producto']);
    
    if (empty($producto)) {
        $template = '
        <div class="container">
            <p class="bg-danger" >No existe dicho producto</p>
        </div>
        ';
        print($template);
    } else {
        printf(
            '
        <h2>Editar producto</h2>
    <div class="container  col-sm-6">
    <form method="POST" >
    
        <label for="nombre" class="form-label">Introduce los datos de tu producto.</label>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon3">Nombre</span>
            <input value="%s" type="text" name="titulo_producto" class="form-control" id="nombre" aria-describedby="basic-addon3" required>
            </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Precio</span>
            <input value="%s" type="number" name="precio" class="form-control" id="" aria-describedby="basic-addon3" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">URL de la imagen del producto</span>
            <input value="%s" type="text" name="imagen" class="form-control" id="" aria-describedby="basic-addon3" required>
        </div>
        <div class="input-group">
            <span class="input-group-text">Descripcion del producto</span>
            <textarea name="descripcion"class="form-control" aria-label="With textarea">%s</textarea>
            </div>
        <div class="m-3">
        <input type="hidden" name="r" value="editar-producto">
        <input type="hidden" name="crud" value="update">
        <input type="hidden" name="id_usuario" value="%s">
        <input class="btn btn-primary" type="submit" Value="Editar">
            </div>
    </form>
    </div>
    ',
            $producto[0]['titulo_producto'],
            $producto[0]['precio'],
            $producto[0]['imagen'],
            $producto[0]['descripcion'],
            $producto[0]['id_usuario']
        );
    }
} else if ($_POST['r'] == 'editar-producto' && $_POST['crud'] == 'update') {

    $update_producto = array(
        'titulo_producto' => $_POST['titulo_producto'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio'],
        'imagen' => $_POST['imagen'],
        'id_usuario' => $_POST['id_usuario']
    );

    $producto = $producto_controller->update($update_producto);
    $template = '
    <div class="container card bg-success center-elm">
        <p >Producto <b>%s</b> actualizado.</p>
    </div>
    <script>
        window.onload() = function(){
            reloadPage("misProductos");
        }
    </script>
    ';
    printf($template, $_POST['titulo_producto']);
} else {
    print('
    <div class="container card bg-danger center-elm">
        <p >Sitio prohibido</p>
    </div>
    ');
}
