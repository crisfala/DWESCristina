CREATE DATABASE `DAW209_DBDepartamento` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `DAW209_DBDepartamento`;

CREATE TABLE  `DAW209_DBDepartamento`.`Departamentos`( 
    `codDepartamento` VARCHAR(3) NOT NULL primary key, 
    `descDepartamento` VARCHAR( 250 ) NOT NULL
) ENGINE = INNODB;