CREATE TABLE produto(id int auto_increment primary key, produto VARCHAR(255), preco DECIMAL(10.2));
CREATE TABLE produto(id INTEGER PRIMARY KEY AUTOINCREMENT, produto VARCHAR(255), preco DECIMAL(10.2));


INSERT INTO produto  (produto, preco) VALUES ('fusca', 5300);
ALTER TABLE `produto` CHANGE `preso` `preco` DECIMAL(10,0) NULL DEFAULT NULL;
ALTER TABLE produto ADD COLUMN descricao text;
ALTER TABLE produto ADD COLUMN categoria_id int;
UPDATE produto SET categoria_id = 3;
UPDATE produto SET descricao = 'Descricao deste produto';

CREATE TABLE categoria(id int auto_increment PRIMARY KEY, nome VARCHAR(255));
CREATE TABLE categoria(id INTEGER PRIMARY KEY AUTOINCREMENT, nome VARCHAR(255));

INSERT INTO categoria(nome) VALUES ("esporte"), ("escolar"), ("mobilidade");

CREATE TABLE usuario(id int auto_increment primary key, email VARCHAR(255), senha VARCHAR(255));
CREATE TABLE usuario(id INTEGER PRIMARY KEY AUTOINCREMENT, email VARCHAR(255), senha VARCHAR(255));

INSERT INTO usuario(email, senha) VALUES("regi@teste.com", " 827ccb0eea8a706c4c34a16891f84e7b");
