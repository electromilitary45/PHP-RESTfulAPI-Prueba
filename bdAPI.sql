-- DANGER 
DROP DATABASE bdAPI;

-- INIT
CREATE DATABASE IF NOT EXISTS bdAPI;

--------- Tables --------
CREATE TABLE IF NOT EXISTS bdAPI.User (
    --
    userId int NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    apellidos varchar(50) NOT NULL,
    edad int,
    administrador bit,
    estado bit NOT NULL DEFAULT 1,
    --
    PRIMARY KEY(userId)
);

CREATE TABLE IF NOT EXISTS bdAPI.Products (
    --
    productId int NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    precio float NOT NULL,
    estado bit NOT NULL,
    --
    PRIMARY KEY(productId)
);

CREATE TABLE IF NOT EXISTS bdAPI.Compra (
    --
    CompraId int NOT NULL AUTO_INCREMENT,
    userId int NOT NULL AUTO_INCREMENT,
    --
    PRIMARY KEY(CompraId),
    FOREIGN KEY (userId) REFERENCES User(userId)
);

CREATE TABLE IF NOT EXISTS bdAPI.CompraProducto(
    --
    CompraProductoId int NOT NULL AUTO_INCREMENT,
    CompraId int NOT NULL AUTO_INCREMENT,
    productId int NOT AUTO_INCREMENT,
    --
    PRIMARY KEY(CompraProductoId),
    FOREIGN KEY(CompraId) REFERENCES Compra(CompraId),
    FOREIGN KEY(productId) REFERENCES Products(productId)
);