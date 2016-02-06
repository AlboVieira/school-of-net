<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 05/02/2016
 * Time: 22:27
 */
class Cliente
{
    private $nome;
    private $cpf;
    private $endereco;
    private $telefone;
    private $filiacao;

    /**
     * Cliente constructor.
     * @param $nome
     * @param $cpf
     * @param $endereco
     * @param $telefone
     */
    public function __construct($nome = null, $cpf = null, $endereco = null, $telefone = null,$filiacao=null)
    {
        $this->nome = !is_null($nome) ? $nome : null;
        $this->cpf = !is_null($cpf) ? $cpf : null;
        $this->endereco = !is_null($endereco) ? $endereco : null;
        $this->telefone = !is_null($telefone) ? $telefone : null;
        $this->filiacao = !is_null($filiacao) ? $filiacao: null;
    }

    public function getList(){
        $list = [
            1 => new Cliente('Albo Vieira', '444444333-75', 'Rua Anna Maria de Jesus', '313333-3333','Joao'),
            2 => new Cliente('Vitor Joao', '888444333-90', 'Rua Souza numero 3', '313333-3333','Carlos'),
            3 => new Cliente('Camila Elias', '888444333-90', 'Rua Souza numero 3', '313333-3333','Milton'),
            4 => new Cliente('Alvara Borges', '888444333-90', 'Rua Souza numero 3', '313333-3333','Jose'),
            5 => new Cliente('William Mendes', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            6 => new Cliente('Carol Silva', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            7 => new Cliente('Tais Carla', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            8 => new Cliente('Pedro Dias', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            9 => new Cliente('Joana Bittencout', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            10 => new Cliente('Otavio Souza', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
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

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getFiliacao(){
        return $this->filiacao;
    }



}