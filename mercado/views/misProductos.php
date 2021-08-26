<?php
print('<h2>Mis productos</h2>');

$producto_controller = new ProductoController();

$producto = $producto_controller->read_by_usuario($_SESSION['id_usuario']);

if (empty($producto)) {
    print('
    <div class="container">
    <p>Aún no tiens ningún producto.</p>
    <p>Sube algún producto para que puedan comprarte.</p>

</div>
    ');
} else {

    $template_producto = '
    <div class="container table-responsive-md">
    <table class="table table-dark table-hover ">
        <thead>
            <tr>
                <th scope="col">Identificador</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th colspan="2" scope="col">
                    <form  method="POST">
                    <input type="hidden" name="r" value="agregar-producto">
                    <input type="submit" class="btn btn-success" value="Agregar" >
                    </form>
                </th>
            </tr>
        </thead>
        <tbody>';
        for ($i=0; $i < count($producto) ; $i++) { 
            $template_producto.='
            <tr>
                <th scope="row">'.$producto[$i]['id_producto'].'</th>
                <td>'.$producto[$i]['titulo_producto'].'</td>
                <td>'.$producto[$i]['descripcion'].'</td>
                <td>'.$producto[$i]['precio'].'</td>
                <td><img class="img" src="'.$producto[$i]['imagen'].'" alt="Producto"></td>
                <td>
                    <form  method="POST">
                    <input type="hidden" name="r" value="editar-producto">
                    <input type="hidden" name="id_producto" value="'.$producto[$i]['id_producto'].'">
                    <input type="submit" class="btn btn-primary" value="Editar" >
                    </form>
                </td>
                <td>
                    <form  method="POST">
                    <input type="hidden" name="r" value="eliminar-producto">
                    <input type="hidden" name="id_producto" value="'.$producto[$i]['id_producto'].'">
                    <input type="submit" class="btn btn-danger" value="Eliminar" >
                    </form>
                </td>
            </tr>
            ';
            
        }
        $template_producto.='
        </tbody>
    </table>
    </div>
    ';
    print($template_producto);
}
