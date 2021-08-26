DROP DATABASE IF EXISTS `mercado`;

CREATE DATABASE IF NOT EXISTS `mercado`;

USE `mercado`;

CREATE TABLE `mercado`.`empleado`(
    id_empleado INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rfc VARCHAR(13) NOT NULL,
    permiso_crear BIT NOT NULL,
    permiso_actualizar BIT NOT NULL,
    permiso_eliminar BIT NOT NULL,
    permiso_consultar BIT NOT NULL,
    CONSTRAINT uk_RFC UNIQUE (rfc)
) ENGINE = InnoDB;

CREATE TABLE `mercado`.`usuario`(
    id_usuario INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    apellido_paterno VARCHAR(40) NOT NULL,
    apellido_materno VARCHAR(40) NULL,
    correo VARCHAR(40) NOT NULL,
    contrasenia CHAR(32) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    es_empleado BIT NOT NULL,
    id_empleado INTEGER NULL,
    nacimiento DATE NOT NULL,
    CONSTRAINT `fk_empleado_usuario` FOREIGN KEY (id_empleado) REFERENCES `mercado`.`empleado` (id_empleado) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE `mercado`.`producto`(
    id_producto INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo_producto VARCHAR(40) NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    precio DECIMAL(9, 2) NOT NULL,
    imagen VARCHAR(200) NOT NULL,
    id_usuario INTEGER NOT NULL,
    CONSTRAINT `fk_id_usuario_producto`  FOREIGN KEY (id_usuario) REFERENCES `mercado`.`usuario` (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE,
    FULLTEXT KEY busqueda(titulo_producto, descripcion)
) ENGINE = InnoDB;

CREATE TABLE `mercado`.`pedido`(
    id_pedido INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha TIMESTAMP NOT NULL,
    id_usuario INTEGER NOT NULL,
    id_producto INTEGER NOT NULL,
    estado ENUM('pagado', 'pendiente', 'cancelado') NOT NULL,
    CONSTRAINT `uk_fecha_id_usuario_id_producto` UNIQUE (fecha, id_usuario, id_producto),
    CONSTRAINT `fk_id_usuario_pedido` FOREIGN KEY (id_usuario) REFERENCES `mercado`.`usuario` (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_pedido_id_producto` FOREIGN KEY (id_producto) REFERENCES `mercado`.`producto` (id_producto) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE `mercado`.`categoria`(
    id_categoria INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo_categoria VARCHAR(40) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE `mercado`.`categorizacion`(
    id_categorizacion INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_producto INTEGER NOT NULL,
    id_categoria INTEGER NOT NULL,
    CONSTRAINT `uk_id_producto_id_categoria` UNIQUE (id_producto, id_categoria),
    CONSTRAINT `fk_id_producto` FOREIGN KEY (id_producto) REFERENCES `mercado`.`producto` (id_producto) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_id_categoria` FOREIGN KEY (id_categoria) REFERENCES `mercado`.`categoria` (id_categoria) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

INSERT INTO
    `mercado`.`empleado` (
        rfc,
        permiso_crear,
        permiso_actualizar,
        permiso_eliminar,
        permiso_consultar
    )
VALUES
    ('RUBP010313B73', 1, 1, 1, 1);

INSERT INTO
    `mercado`.`usuario`(
        nombre,
        apellido_paterno,
        apellido_materno,
        correo,
        contrasenia,
        telefono,
        es_empleado,
        id_empleado,
        nacimiento
    )
VALUES
    (
        'Pablo Fernando',
        'Rubio',
        'Bailon',
        'pablo.rubio.bailon@gmail.com',
        MD5('Mochila13'),
        '+(52)5577837555',
        1,
        1,
        '2001-03-13'
    ),
    (
        'Usuario',
        'Mortal',
        NULL,
        'usuario_mortal@gmail.com',
        MD5('mortal'),
        '+(52)5555555555',
        0,
        NULL,
        '202-08-20'
    );

INSERT INTO
    `mercado`.`producto` (
        titulo_producto,
        descripcion,
        imagen,
        precio,
        id_usuario
    )
VALUES
    (
        'Sombras doble tono',
        'Lindas sombras con doble todo, incluye brochita difuminadora',
        'https://images.freeimages.com/images/large-previews/0a8/makeup-tools-1555062.jpg',
        16.99,
        1
    ),
    (
        'Pinzas para ropa',
        'Pinzas de plastico para tender ropa',
        'https://images.freeimages.com/images/large-previews/8b5/laundry-tools-1555045.jpg',
        0.99,
        1
    ),
    (
        'Ponchadora de cables de red',
        'Herramienta que te permite crimpear y construir cables UTP de red',
        'https://images.freeimages.com/images/large-previews/81a/crimping-tool-1242520.jpg',
        93,
        1
    ),
    (
        'Rollo para camara',
        'Rollo para camaras, toma hasta 100 fotos.',
        'https://images.freeimages.com/images/large-previews/06b/tools-of-the-trade-1-1544010.jpg',
        20,
        2
    ),
    (
        'Lente SIGMA angular',
        'Lente de precision especialmente para grandes distancias.',
        'https://images.freeimages.com/images/large-previews/087/tools-of-the-trade-2-1544011.jpg',
        20,
        2
    ),
    (
        'Kit 3 en 1',
        'Este kit contiene unas tijeras con recubrimiento, un destapador, y un cuchillo estilo suizo.',
        'https://images.freeimages.com/images/large-previews/220/tools-4-1526479.jpg',
        35.50,
        2
    ),
    (
        'Cubo Rubik',
        'Divertido rompecabezas rubik para pasar el rato sólo o en familia.',
        'https://images.freeimages.com/images/large-previews/33c/object-with-path-1552086.jpg',
        35.50,
        2
    );

INSERT INTO
    `mercado`.`categoria` (titulo_categoria)
VALUES
    ('oficina'),
    ('jardin'),
    ('hogar'),
    ('juguetes'),
    ('mascotas'),
    ('alimentos'),
    ('herramientas'),
    ('belleza'),
    ('electronicos');

INSERT INTO
    `mercado`.`categorizacion` (id_producto, id_categoria)
VALUES
    (1, 8),
    (2, 3),
    (2, 2),
    (3, 7),
    (4, 9),
    (5, 9),
    (6, 1),
    (6, 3),
    (7, 4);