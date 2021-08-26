<?php
require_once('./controllers/Autoload.php');

echo '<h1>CRUD con MVC de la tabla producto</h1>';

$producto = new ProductoController();

$producto_data = $producto->read();
print_r($producto_data);


$num_productos = count($producto_data);

echo "<h2>Numero de productos: <mark>$num_productos</mark> </h2>";

echo "<h2>Tabla de productos</h2>";
echo '
<table>
    <thead>
        <tr>
            <th>Producto id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
    </thead>';
    for ($i=0; $i < $num_productos; $i++) { 
        echo '
        <tbody>
            <tr>
                <td>'.$producto_data[$i]['id_producto'].'</td>
                <td>'.$producto_data[$i]['titulo_producto'].'</td>
                <td>'.$producto_data[$i]['descripcion'].'</td>
                <td>$'.$producto_data[$i]['precio'].'</td>
                <td><img width="50px" src="'.$producto_data[$i]['imagen'].'" alt="Producto"></td>
            </tr>
        </tbody>
        ';
    }
echo '</table>';

echo "<h2>Insertar producto</h2>";
$new_producto = array(
    'titulo_producto'=>'Dispensador plástico' ,
    'descripcion'=>'Dispensador plastico con capacidad de 1 LT (reutilizable ).',
    'imagen'=>'https://images.freeimages.com/images/large-previews/f6f/pomo-1421417.jpg',
    'precio'=>'23'
);
//  $producto->create($new_producto); 
echo "<h2>Actualizar de producto</h2>";
$update_producto = array(
    'id_producto'=>11,
    'titulo_producto'=>'Dispensador plástico' ,
    'descripcion'=>'Este es un dispensador de plástico con capacidad de 1 LT (reutilizable ).',
    'imagen'=>'https://images.freeimages.com/images/large-previews/f6f/pomo-1421417.jpg',
    'precio'=>'23'
);
// $producto->update($update_producto);
echo "<h2>Eliminar producto</h2>";
// $producto->delete(11);