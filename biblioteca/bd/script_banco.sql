DROP DATABASE IF EXISTS lojaweb;
CREATE DATABASE IF NOT EXISTS lojaweb;

USE lojaweb;

create table cliente(
	idCliente int(11) NOT NULL auto_increment,
	email varchar (50) NOT NULL,
	senha varchar (15) NOT NULL,
	cpf varchar (15) NOT NULL,
	nome varchar (60) NOT NULL,
	nascimento varchar (10) NOT NULL,
	sexo varchar (10) NOT NULL,
	telefone varchar (15) NOT NULL,
	primary key (idCliente)
);

create table categoria(
	idCategoria int(11) NOT NULL auto_increment,
	descricao varchar (200) NOT NULL,
	primary key (idCategoria)
);

CREATE TABLE produto(
    idProduto int(11) NOT NULL AUTO_INCREMENT,
    idCategoria int(11) NOT NULL,
    preco VARCHAR(10) NOT NULL,
    nomeProduto VARCHAR(100) NOT NULL,
    tipo VARCHAR(60) NOT NULL,
    cor VARCHAR(10) NOT NULL,
    fabricante VARCHAR(100) NOT NULL,
    descricao VARCHAR(500) NOT NULL,
    tamanho VARCHAR(20) NOT NULL,
    imagem VARCHAR(200) NOT NULL,
    quantidade VARCHAR(60) NOT NULL,
    estoque_minimo INT(8) NOT NULL,
    estoque_maximo INT(8) NOT NULL,
    PRIMARY KEY (idProduto),
    FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria) ON UPDATE CASCADE ON DELETE CASCADE
);

create table usuario (
	idUsuario int(11) not null auto_increment,
	nomeUsuario varchar(60) not null,
	email varchar(60) not null,
	senha varchar(60) not null,
	cpf varchar(60) not null,
	dataNascimento varchar(10) not null,
	sexo varchar(60) not null,
	tipoUsuario varchar(5),
	primary key (idUsuario)
);

create table endereco (
	idEndereco int(11) not null auto_increment,
	idUsuario int(11) not null,
	logradouro varchar(60) not null,
	numero varchar(7) not null,
	complemento varchar(60) not null,
	bairro varchar(60) not null,
	cidade varchar(60) not null,
	cep varchar(60),
	primary key (idEndereco),
	foreign key (idUsuario) references usuario(idUsuario) on update cascade on delete cascade
);

CREATE TABLE FormaPagamento (
	idFormaPagamento int(11) NOT NULL auto_increment,
	descricao varchar (45) NOT NULL,
	primary key (idFormaPagamento)
);

create table pedido (
	idPedido int(11) not null auto_increment,
	idUsuario int(11) not null,
	idEndereco int(11) not null,
	dataCompra date not null,
	primary key (idPedido),
	foreign key (idUsuario) references usuario(idUsuario) on update cascade on delete cascade,
	foreign key (idEndereco) references usuario(idUsuario) on update cascade on delete cascade
);

CREATE TABLE log_produto(
	ID_LOG INT(11) NOT NULL  AUTO_INCREMENT,
	TABELA VARCHAR(45) NOT NULL,
	USUARIO VARCHAR(45) NOT NULL,
	DATA_HORA DATETIME NOT NULL,
	ACAO VARCHAR(45) NOT NULL,
	DADOS VARCHAR(1000) NOT NULL,
	PRIMARY KEY (ID_LOG)
);

CREATE TABLE pedido_produto(
	idProduto INT(11) NOT NULL,	
	idPedido INT(11) NOT NULL,
	quantidade INT(11) NOT NULL,
	PRIMARY KEY (idProduto, idPedido),
	FOREIGN KEY (idProduto) REFERENCES produto(idProduto) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPedido) REFERENCES pedido(idPedido) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE estoque(
	idEstoque INT(11) NOT NULL AUTO_INCREMENT,
	idProduto INT(11) NOT NULL,	
	quantidade INT(11) NOT NULL,
	PRIMARY KEY (idestoque),
	FOREIGN KEY (idProduto) REFERENCES produto(idProduto) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE cupom(
    idCupom int(11) not null auto_increment,
    descricao varchar (60) NOT NULL,
    desconto INT(11) NOT NULL,
    primary key (idCupom)
);