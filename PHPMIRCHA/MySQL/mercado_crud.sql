/* Empleado //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/ 
-- Crear ********************************************************************************
INSERT INTO
    `mercado`.`empleado`
SET
    rfc = "RUBK110815B73",
    permiso_crear = 1,
    permiso_actualizar = 1,
    permiso_eliminar = 1,
    permiso_consultar = 1;

INSERT INTO
    `mercado`.`usuario`
SET
    nombre = "Kely",
    apellido_paterno = "Rubio",
    apellido_materno = "Bailon",
    correo = "kely@gmail.com",
    contrasenia = MD5("kelyguadalupe"),
    telefono = "(+52)5578591426",
    es_empleado = 1,
    id_empleado = 2,
    nacimiento = "2011-08-15";

-- Actualizar ********************************************************************************
UPDATE
    `mercado`.`empleado`
SET
    rfc = "RUBK110815B73",
    permiso_crear = 1,
    permiso_actualizar = 1,
    permiso_eliminar = 1,
    permiso_consultar = 1
WHERE
    id_empleado = 2;

UPDATE
    `mercado`.`usuario`
SET
    nombre = "Kely",
    apellido_paterno = "Rubio",
    apellido_materno = "Bailon",
    correo = "kely@gmail.com",
    contrasenia = MD5("kelyguadalupe"),
    telefono = "(+52)5578591426",
    es_empleado = 1,
    id_empleado = 2,
    nacimiento = "2011-08-15"
WHERE
    id_usuario = 3;

-- Eliminar ********************************************************************************
DELETE FROM
    `mercado`.`empleado`
    WHERE
    id_empleado = 2;

DELETE FROM
    `mercado`.`usuario`
    WHERE
        id_usuario = 3;

-- Buscar todos los empleados ********************************************************************************
SELECT * FROM `mercado`.`empleado` AS e 
    INNER JOIN `mercado`.`usuario` AS u
    ON e.id_empleado = u.id_usuario;
-- Buscar un empleado ********************************************************************************
SELECT * FROM `mercado`.`empleado` AS e 
    INNER JOIN `mercado`.`usuario` AS u
    ON e.id_empleado = u.id_usuario
    WHERE e.id_empleado = 2;

/* Usuario //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
-- Crear********************************************************************************
INSERT INTO
    `mercado`.`usuario`
SET
    nombre = "Melvyn",
    apellido_paterno = "Bailon",
    apellido_materno = "Villa",
    correo = "melvyn@gmail.com",
    contrasenia = MD5("melvyn"),
    telefono = "(+52)5536489528",
    es_empleado = 0,
    id_empleado = NULL,
    nacimiento = "1993-06-08";
-- Actualizar********************************************************************************
UPDATE
    `mercado`.`usuario`
SET
    nombre = "Melvyn",
    apellido_paterno = "Bailon",
    apellido_materno = "Villa",
    correo = "melvyn@gmail.com",
    contrasenia = MD5("melvyn"),
    telefono = "(+52)5536489528",
    es_empleado = 0,
    id_empleado = NULL,
    nacimiento = "1993-06-08"
WHERE
    id_usuario = 4;
-- Eliminar********************************************************************************
DELETE FROM
    `mercado`.`usuario`
    WHERE
        id_usuario = 4;
-- Buscar todos los usuarios********************************************************************************
SELECT * FROM `mercado`.`usuario`;
-- Buscar un usuario ********************************************************************************
SELECT * FROM `mercado`.`usuario`
    WHERE
        id_usuario = 4;

/* Producto ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */
-- Crear********************************************************************************
INSERT INTO
    `mercado`.`producto`
    SET
    titulo_producto="Cortauñas",
    descripcion="Hermoso cortauñas metálico, inoxidable",
    imagen="https://images.freeimages.com/images/large-previews/a9c/everyday-objects-11-1547307.jpg",
    precio=15;
-- Actualizar********************************************************************************
UPDATE
    `mercado`.`producto`
SET
    titulo_producto="Cortauñas",
    descripcion="Hermoso cortauñas metálico, inoxidable",
    imagen="https://images.freeimages.com/images/large-previews/a9c/everyday-objects-11-1547307.jpg",
    precio=15;
WHERE
    id_producto= 8;
-- Eliminar********************************************************************************
DELETE FROM
    `mercado`.`producto`
    WHERE
        id_producto= 8;
-- Buscar todos los productos********************************************************************************
SELECT * FROM  `mercado`.`producto`;
-- Buscar un producto ********************************************************************************
SELECT * FROM  `mercado`.`producto`
 WHERE
        id_producto= 8;
-- Buscar un producto POR TITULO O POR DESCRIPCION ********************************************************************************
SELECT * FROM producto
WHERE MATCH(titulo_producto, descripcion)
AGAINST('para' IN BOOLEAN MODE);
/* Pedido ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */
-- Crear********************************************************************************
INSERT INTO
    `mercado`.`pedido`
    SET
    fecha=NOW( ),
    id_usuario=2,
    id_producto=6,
    estado="pendiente";
-- Actualizar********************************************************************************
UPDATE
    `mercado`.`pedido`
SET
    fecha=NOW( ),
    id_usuario=2,
    id_producto=5,
    estado="pendiente"
WHERE
    id_pedido = 1;
-- Eliminar********************************************************************************
DELETE FROM `mercado`.`pedido`
WHERE
    id_pedido = 1;
-- Buscar todos los pedidos********************************************************************************
SELECT * FROM `mercado`.`pedido`;
-- Buscar un pedido ********************************************************************************
SELECT * FROM `mercado`.`pedido`
WHERE
    id_pedido = 1;
/* Categoría ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */
-- Crear********************************************************************************
INSERT INTO
    `mercado`.`categoria`
    SET
    titulo_categoria="cocina";
-- Actualizar********************************************************************************
UPDATE
    `mercado`.`categoria`
SET
    titulo_categoria="cocina";
WHERE
    id_pedido = 10;
-- Eliminar********************************************************************************
DELETE FROM `mercado`.`categoria`
WHERE
    id_pedido = 10;
-- Buscar todos las categorias ********************************************************************************
SELECT * FROM `mercado`.`categoria`;
-- Buscar una categoria********************************************************************************
SELECT * FROM `mercado`.`categoria`
WHERE
    id_pedido = 10;
/* Categorizacion ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */
-- Crear********************************************************************************
INSERT INTO
    `mercado`.`categorizacion`
SET
    id_producto=8,
    id_categoria=3;
-- Actualizar********************************************************************************
UPDATE
    `mercado`.`categorizacion`
SET
    id_producto=8,
    id_categoria=3;
WHERE
    id_categorizacion = 10;
-- Eliminar********************************************************************************
DELETE FROM `mercado`.`categorizacion`
WHERE
    id_pedido = 10;
-- Buscar todos las categorizaciones********************************************************************************
SELECT * FROM `mercado`.`categorizacion`;
-- Buscar una categorizacion********************************************************************************
SELECT * FROM `mercado`.`categorizacion`
WHERE
    id_pedido = 10;