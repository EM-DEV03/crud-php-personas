DROP TABLE IF EXISTS persona;

CREATE TABLE persona (
    id INT NOT NULL IDENTITY(1,1),
    nombre VARCHAR(45) NOT NULL,
    apellido VARCHAR(45) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    ciudad VARCHAR(45) NOT NULL,
    correo VARCHAR(45) NOT NULL,
    PRIMARY KEY (id)
);
