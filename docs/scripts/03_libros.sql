CREATE TABLE libros(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    titulo VARCHAR(255) NOT NULL COMMENT 'Titulo del libro',
    resumen VARCHAR(255) NOT NULL UNIQUE COMMENT 'Resumen del libro, debe ser unico',
    autor VARCHAR(255) NOT NULL UNIQUE COMMENT 'Nombre del autor del libro',
    fecha_publicacion DATE NOT NULL COMMENT 'Fecha de publicacion del libro',
    genero VARCHAR(100) NOT NULL COMMENT 'Genero literario del libro',
    precio DECIMAL(10,2) NOT NULL COMMENT 'Precio del libro'
);