

CREATE DATABASE creacioneskere; -- creo la base de datos creacioneskere

use creacioneskere; -- para indicar qur trabajare con la base de datos creacioneskere

-- inserto registros de productos en la tabla productos
INSERT INTO productos (nombre, descripcion, precio, stock) VALUES 
('Pulsera de la amistad', 'Pulsera hecha a mano de hilo, ideal para compartir con amigos.', 10, 20),
('Pulsera de la suerte', 'Pulsera con patrones de colores para atraer la buena suerte.', 15, 30),
('Pulsera trenzada', 'Pulsera de nailon trenzado con cierre ajustable.', 12, 25),
('Pulsera de macramé', 'Pulsera tejida a mano con técnica de macramé, disponible en varios colores.', 18, 40),
('Pulsera tejida', 'Pulsera de hilo tejida con diseño geométrico.', 8, 15),
('Pulsera de nudos', 'Pulsera con nudos decorativos y cierre magnético.', 20, 35),
('Pulsera de cuerda', 'Pulsera ajustable de cuerda con dije de metal.', 14, 28),
('Pulsera de hilo', 'Pulsera delicada de hilo en colores pastel.', 7, 12),
('Pulsera de nailon', 'Pulsera resistente al agua y duradera, ideal para actividades al aire libre.', 25, 50),
('Pulsera de la amistad XL', 'Pulsera grande para compartir con muchos amigos.', 15, 10),
('Pulsera deportiva', 'Pulsera resistente diseñada para deportes y actividades físicas.', 30, 60),
('Pulsera étnica', 'Pulsera con diseño étnico y detalles de cuentas.', 22, 45),
('Pulsera minimalista', 'Pulsera sencilla y elegante para uso diario.', 12, 22),
('Pulsera retro', 'Pulsera inspirada en los estilos de los años 70.', 17, 33),
('Pulsera bohemia', 'Pulsera con borlas y detalles bohemios.', 20, 38),
('Pulsera vintage', 'Pulsera con aspecto antiguo y encanto retro.', 25, 48),
('Pulsera casual', 'Pulsera versátil para combinar con cualquier atuendo.', 10, 20),
('Pulsera elegante', 'Pulsera sofisticada para ocasiones especiales.', 35, 70),
('Pulsera juvenil', 'Pulsera con diseño juvenil y divertido.', 14, 25),
('Pulsera de verano', 'Pulsera ligera y colorida para la temporada de verano.', 9, 18),
('Pulsera de invierno', 'Pulsera acogedora con detalles invernales.', 20, 40),
('Pulsera de otoño', 'Pulsera con tonos cálidos y elementos naturales.', 16, 32),
('Pulsera de primavera', 'Pulsera con flores y colores pastel para la primavera.', 12, 24),
('Pulsera elegante', 'Pulsera de diseño elegante con incrustaciones de piedras preciosas.', 50, 100),
('Pulsera rústica', 'Pulsera con aspecto rústico y detalles de madera.', 18, 36),
('Pulsera moderna', 'Pulsera con diseño moderno y minimalista.', 25, 50),
('Pulsera clásica', 'Pulsera atemporal con detalles clásicos.', 30, 60),
('Pulsera boho-chic', 'Pulsera con estilo bohemio y toques de glamour.', 28, 55),
('Pulsera de plata', 'Pulsera de plata esterlina con grabados.', 40, 80),
('Pulsera de oro', 'Pulsera de oro con diseño delicado.', 60, 120),
('Pulsera de cuero', 'Pulsera de cuero genuino con cierre de hebilla.', 22, 44),
('Pulsera de perlas', 'Pulsera con perlas naturales y broche de plata.', 45, 90),
('Pulsera artesanal', 'Pulsera hecha a mano con materiales naturales.', 15, 30),
('Pulsera de moda', 'Pulsera de moda con detalles de encaje.', 18, 36),
('Pulsera minimalista', 'Pulsera sencilla con diseño minimalista.', 12, 24),
('Pulsera glamurosa', 'Pulsera con cristales y brillos para ocasiones especiales.', 55, 110),
('Pulsera tribal', 'Pulsera inspirada en motivos tribales y étnicos.', 20, 40),
('Pulsera de encaje', 'Pulsera delicada de encaje con cierre de lazo.', 14, 28),
('Pulsera de plata', 'Pulsera de plata con dijes y charms.', 35, 70),
('Pulsera de oro rosa', 'Pulsera de oro rosa con detalles florales.', 65, 130),
('Pulsera vintage', 'Pulsera vintage con eslabones de estilo antiguo.', 42, 84),
('Pulsera de madera', 'Pulsera hecha de cuentas de madera naturales.', 20, 40),
('Pulsera de cristal', 'Pulsera con cuentas de cristal facetadas.', 25, 50),
('Pulsera de acero', 'Pulsera de acero inoxidable con eslabones entrelazados.', 30, 60),
('Pulsera elegante', 'Pulsera elegante con incrustaciones de piedras preciosas.', 60, 120),
('Pulsera bohemia', 'Pulsera bohemia con borlas y detalles étnicos.', 22, 44),
('Pulsera de playa', 'Pulsera de colores vivos y materiales resistentes al agua.', 12, 24);

desc productos; -- consulta para saber las columnas de esta tabla

SELECT id_producto, nombre, precio, imagen  FROM  productos LIMIT 10; -- consulta la tabla productos y trae el id y el nombre y precio de esta tabla pero solo los 10 primeros registros
SELECT nombre, precio FROM productos WHERE precio > 10000; -- trae el nombre y el precio de los productos con precio mayor a 10000
SELECT COUNT(id_producto) FROM productos; -- me trae el total de registros de la tabla productos
SELECT MAX(precio) FROM productos; -- me dice que registro tiene el mayor precio 
SELECT AVG(precio) FROM productos; --  me trae la media de precios
SELECT SUM(precio) FROM productos; -- me suma todos los precios de la tabla
SELECT nombre, precio FROM productos ORDER BY precio ASC LIMIT 1; -- me trae de la tabla productos el registro con menor precio 
UPDATE productos SET precio = 21000 WHERE id_producto = 1; -- actualiza precios de el producto con id 1

ALTER TABLE productos ADD  imagen BLOB; -- agrega un columna nuva a la tabla llamada imagen
ALTER TABLE user MODIFY COLUMN ID INT AUTO_INCREMENT; -- modifica el id para que sea auto incrementable

UPDATE productos SET imagen = 'C:/xampp-php/htdocs/bdindigenas/recursos/img/manilla.jpeg' WHERE id_producto = 1; -- agrega una imagen a la tabla productos en el id 1
UPDATE productos SET precio = 22000 WHERE id_producto in ('3','4','5','6'); -- elimina los registros con id 3,4,5,6

-- creacion de la base de datos para los usuarios que se registraran
CREATE DATABASE login; 
use login; -- para indicar qur trabajare con la base de datos creacioneskere

-- creacion de la tabla rol
CREATE TABLE IF NOT EXISTS `login`.`rol` (
  `ID` INT NOT NULL,
  `NOMBREROL` VARCHAR(255) NULL,
  `DESCRIPCION` VARCHAR(255) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;

-- inserto datos la tabla rol
INSERT INTO rol (ID, DESCRIPCION, NOMBREROL)
VALUES 
(1, 'Este es rol para administrar toda la base de datos', 'administrador'),
(2, 'Este rol solo es para ver la info', 'usuario');

DESC rol; -- Me muestra las columnas de la tabla rol

SELECT ID, NOMBREROL, DESCRIPCION FROM rol; -- me trae el id, nombre y descripcion de la tabla rol

-- creo la tabla user
CREATE TABLE IF NOT EXISTS `login`.`user` (
  `ID` INT NOT NULL,
  `usuario` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `fk_rol` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `correo` VARCHAR(255) NULL,
  `last_session` VARCHAR(45) NULL,
  `activacion` VARCHAR(45) NULL,
  `token` VARCHAR(45) NULL,
  `token_password` VARCHAR(45) NULL,
  `password_request` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_rol_idx` (`fk_rol` ASC) VISIBLE,
  CONSTRAINT `fk_rol`
    FOREIGN KEY (`fk_rol`)
    REFERENCES `indigenas_berastegui`.`rol` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

desc user; -- Me muestra las columnas de la tabla rol

-- inserto valores a la tabla user
INSERT INTO user (id,usuario, nombre, fk_rol) value (1,'jimmis', 'jimmis', 1);
UPDATE user SET correo = 'jhoangd.jgd@gmail.com' WHERE id= 1;

select * from user; -- trae todos los datos de la tabla user
DELETE FROM user WHERE ID  IN (6,7,8,9); -- elimina los registro con id 6,7,8,9

SHOW Tables; -- me muestra las tabla que tiene creada mi base de datos
