CREATE DATABASE IF NOT EXISTS bicicletaria;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80),
    senha VARCHAR(255),
    email VARCHAR(255)
);

CREATE TABLE bicicletas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100),
    marca VARCHAR(60),
    preco DECIMAL(10,2),
    imagem VARCHAR(255)
);
