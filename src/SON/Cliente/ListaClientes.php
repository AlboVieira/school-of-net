<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 05/02/2016
 * Time: 22:27
 */

namespace SON\Cliente;

use SON\Cliente\TipoCliente\ClientePessoaFisica;
use SON\Cliente\TipoCliente\ClientePessoaJuridica;

class ListaClientes
{

    public function getList(){
        $list = [
            1 => new ClientePessoaFisica('Albo Vieira', '444444333-75', 'Rua Anna Maria de Jesus', '313333-3333', 'Jonas',1,'rua souza pinto '),
            2 => new ClientePessoaJuridica('Vitor Joao', '888444333-90', 'Rua Souza numero 3', '313333-3333',2,'rua carlos pereira'),
            3 => new ClientePessoaJuridica('Camila Elias', '888444333-90', 'Rua Souza numero 3', '313333-3333',5),
            4 => new ClientePessoaFisica('Alvara Borges', '888444333-90', 'Rua Souza numero 3', '313333-3333','Jose',3),
            5 => new ClientePessoaJuridica('William Mendes', '888444333-90', 'Rua Souza numero 3', '313333-3333',4,'rua joao bonifacio '),
            6 => new ClientePessoaFisica('Carol Silva', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',1),
            7 => new ClientePessoaFisica('Tais Carla', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',2,'avenida afonso pena '),
            8 => new ClientePessoaFisica('Pedro Dias', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',4),
            9 => new ClientePessoaFisica('Joana Bittencout', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',4),
            10 => new ClientePessoaFisica('Otavio Souza', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',5),
        ];

        return $list;
    }

    public function orderList($order = 'desc'){
        $list = $this->getList();
        if($order == 'asc'){
            arsort($list);
        }else{
            asort($list);
        }
        return $list;
    }
}