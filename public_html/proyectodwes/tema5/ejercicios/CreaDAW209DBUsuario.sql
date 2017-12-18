CREATE DATABASE `DAW209_Usuarios` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;


CREATE TABLE  `DAW209_usuarios`.`Usuarios`( 
    `codUsuario` VARCHAR(30) NOT NULL primary key, 
    `password` VARCHAR( 250 ) NOT NULL
) ENGINE = INNODB;