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
    email VARCHAR(255),
    senha VARCHAR(255)
);

INSERT INTO categoria(nome) VALUES ("esporte"), ("escolar"), ("mobilidade");
INSERT INTO produto  (produto, preco, descricao, categoria_id, usado) 
            VALUES ('fusca', 5300, 'Um classico de alta qualidade', 3, 0);
INSERT INTO usuario(email, senha) VALUES("regi@teste.com", " 827ccb0eea8a706c4c34a16891f84e7b");


