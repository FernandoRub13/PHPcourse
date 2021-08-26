SELECT * FROM producto AS p 
INNER JOIN categorizacion AS c
ON p.id_producto = c.id_producto;

SELECT * FROM empleado AS e 
INNER JOIN usuario AS u
ON e.id_empleado = u.id_usuario;

SELECT * FROM empleado AS e 
INNER JOIN usuario AS u
ON e.id_empleado = u.id_usuario
WHERE e.id_empleado = 1;
/*
SELECT p.titulo_producto,  ca.titulo_categoria FROM producto AS p
*/ 
/*
SELECT concat(p.titulo_producto, ' ', ca.titulo_categoria) FROM producto AS p 
*/ 
SELECT * FROM `mercado`.`usuario`;
SELECT * FROM `mercado`.`producto`;

SELECT DISTINCT p.titulo_producto,  ca.titulo_categoria FROM producto AS p
INNER JOIN categorizacion AS cn
ON p.id_producto = cn.id_producto
INNER JOIN categoria AS ca
ON cn.id_categoria = ca.id_categoria;
/*
GROUP BY p.titulo_producto;
*/
SELECT * FROM producto
WHERE MATCH(titulo_producto, descripcion)
AGAINST('para' IN BOOLEAN MODE);

SELECT * FROM pedido;

DELETE FROM pedido
WHERE
    id_pedido = 1;
    
    
UPDATE
    `mercado`.`pedido`
SET
    fecha=NOW( ),
    id_usuario=2,
    id_producto=5,
    estado="pendiente"
WHERE
    id_pedido = 1;
    
    
INSERT INTO
    `mercado`.`pedido`
    SET
    fecha=NOW( ),
    id_usuario=2,
    id_producto=6,
    estado="pendiente";

SELECT * FROM `mercado`.`pedido`
WHERE
    id_pedido = 2;
select * from categoria;
select * from categorizacion;
select * from producto;
INSERT INTO
    `mercado`.`producto`
    SET
    titulo_producto="Globo batidor",
    descripcion="Globo batidor metálico inoxidable, ideal para mezclar harinas, disuelve grumos",
    imagen="https://images.freeimages.com/images/large-previews/047/everyday-objects-17-1547319.jpg",
    precio=55;
DELETE FROM producto
where id_producto = 8;