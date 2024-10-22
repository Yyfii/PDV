\*Aqui serão feitas todas as operações relacionadas a banco de dados:

https://albuquerque53.medium.com/usando-rotas-no-php-sem-frameworks-c566525a47b8

- conexão

//Schema a ser usado - possibilidade de usar o sqlite
CREATE SCHEMA site1;

USE site1;

CREATE TABLE Admin(
admin_id INT PRIMARY KEY auto_increment,
login varchar(10),
senha varchar(100)
);

CREATE TABLE Cliente (
cliente_id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100),
email VARCHAR(100) UNIQUE,
senha VARCHAR(100),
endereco VARCHAR(255),
telefone VARCHAR(20),
tipo_cliente ENUM('novo', 'cadastrado') DEFAULT 'novo'
);

CREATE TABLE Vendedor (
vendedor_id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100),
email VARCHAR(100) UNIQUE,
senha VARCHAR(100),
telefone VARCHAR(20)
);

CREATE TABLE Produto (
produto_id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100),
preco DECIMAL(10, 2),
categoria_id INT,
qtd INT,
FOREIGN KEY (categoria_id) REFERENCES Cliente(categoria_id),
);

CREATE TABLE Categoria (
categoria_id INT PRIMARY KEY AUTO INCREMENT,
categoria_name VARCHAR(100)
)

CREATE TABLE Pedido (
pedido_id INT PRIMARY KEY AUTO_INCREMENT,
cliente_id INT,
vendedor_id INT,
data_pedido DATE,
status ENUM('processando', 'enviado', 'entregue'),
total DECIMAL(10, 2),
FOREIGN KEY (cliente_id) REFERENCES Cliente(cliente_id),
FOREIGN KEY (vendedor_id) REFERENCES Vendedor(vendedor_id)
);

CREATE TABLE PedidoDetalhe (
pedido_id INT,
produto_id INT,
quantidade INT,
preco_unitario DECIMAL(10, 2),
FOREIGN KEY (pedido_id) REFERENCES Pedido(pedido_id),
FOREIGN KEY (produto_id) REFERENCES Produto(produto_id),
PRIMARY KEY (pedido_id, produto_id)
);

CREATE TABLE Pagamento (
pagamento_id INT PRIMARY KEY AUTO_INCREMENT,
pedido_id INT,
metodo_pagamento ENUM('dinheiro', 'cartao', 'banco_digital', 'carteira'),
valor DECIMAL(10, 2),
FOREIGN KEY (pedido_id) REFERENCES Pedido(pedido_id)
);

CREATE TABLE Login (
login_id INT PRIMARY KEY AUTO_INCREMENT,
usuario_id INT,
tipo_usuario ENUM('cliente', 'vendedor'),
email VARCHAR(100)
);
"# first commit" 
