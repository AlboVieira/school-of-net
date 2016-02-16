<?php
require_once __DIR__ . "/autoload.php";
use SON\Dao\Database\Database;
use SON\Dao\ClienteDao;
use SON\Cliente\TipoCliente\ClientePessoaFisica;
use SON\Cliente\TipoCliente\ClientePessoaJuridica;

$db = new Database();

try {
    // DROP DATABASE
    $query = "DROP DATABASE IF EXISTS teste_poo";

    $pdo = $db->rawConnect();
    $pdo->exec($query);
    // CREATE DATABASE
    $query = "CREATE DATABASE teste_poo";
    $pdo->exec($query);
    // SELECT DATABASE
    $query = "USE teste_poo";
    $pdo->exec($query);

    // CREATE TABLE
    $query = "
        CREATE TABLE clientes_poo (
          id int(11) NOT NULL AUTO_INCREMENT,
          nome varchar(145) DEFAULT NULL,
          cpf varchar(13) DEFAULT NULL,
          filiacao varchar(85) DEFAULT NULL,
          tipo_cliente char(1) DEFAULT NULL,
          cnpj varchar(45) DEFAULT NULL,
          nome_empresa varchar(45) DEFAULT NULL,
          endereco varchar(45) DEFAULT NULL,
          endereco_cobranca varchar(45) DEFAULT NULL,
          nvlImportancia int(11) DEFAULT NULL,
          telefone varchar(45) DEFAULT NULL,
          PRIMARY KEY (id)
        )
          ";
    $pdo->exec($query);

    $clienteDao = new ClienteDao($pdo);

    $cliente1 = new ClientePessoaFisica('Albo Vieira', '444444333-75', 'Rua Anna Maria de Jesus', '313333-3333', 'Jonas',1,'rua souza pinto ');
    $cliente2 = new ClientePessoaJuridica('Vitor Joao', '888444333-90', 'Rua Souza numero 3', '313333-3333',2,'rua carlos pereira');
    $cliente3 = new ClientePessoaJuridica('Camila Elias', '888444333-90', 'Rua Souza numero 3', '313333-3333',5);
    $cliente4 = new ClientePessoaFisica('Alvara Borges', '888444333-90', 'Rua Souza numero 3', '313333-3333','Jose',3);
    $cliente5 = new ClientePessoaJuridica('William Mendes', '888444333-90', 'Rua Souza numero 3', '313333-3333',4,'rua joao bonifacio ');
    $cliente6 = new ClientePessoaFisica('Carol Silva', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',1);
    $cliente7 = new ClientePessoaFisica('Tais Carla', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',2,'avenida afonso pena ');
    $cliente8 = new ClientePessoaFisica('Pedro Dias', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',4);
    $cliente9 = new ClientePessoaFisica('Joana Bittencout', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',4);
    $cliente10 = new ClientePessoaFisica('Otavio Souza', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',5);

    $clienteDao
        ->persist($cliente1)
        ->persist($cliente2)
        ->persist($cliente3)
        ->persist($cliente4)
        ->persist($cliente5)
        ->persist($cliente6)
        ->persist($cliente7)
        ->persist($cliente8)
        ->persist($cliente9)
        ->persist($cliente10)
        ->flush();
    echo "Fixtures executadas com sucesso!\n";
} catch(\PDOException $ex) {
    echo "Erro: {$ex->getMessage()}";
}