CREATE TABLE categoria(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome VARCHAR(255)
);
CREATE TABLE produto(
    id INTEGER PRIMARY KEY AUTOINCREMENT, 
    produto VARCHAR(255), 
    preco DECIMAL(10.2),
    descricao TEXT,
    categoria_id INTEGER,
    usado tinyint(1)

);
CREATE TABLE usuario(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email VARCHAR(255) UNIQUE,
    senha VARCHAR(255)
);

INSERT INTO categoria(nome) VALUES ('esporte'), ('escolar'), ('mobilidade');
INSERT INTO produto  (produto, preco, descricao, categoria_id, usado) 
            VALUES ('Buzao', 5, 'Mobilidade de pobre', 3, 0),
                   ('lapis', 3, 'um lapis qualquer', 2, 0),
                   ('caderno', 3, 'Nao adianta ter uma canete se não te caderno', 2, 0),
                   ('bola', 30, 'bola classica oficial', 1, 1);
INSERT INTO usuario(email, senha) VALUES('regi@teste.com', '$2b$12$KWn7r3KlsEoyZP/i8gXFTeL4NaMcpF6xVXuxNauHyDpD/tNqBJkWu');
