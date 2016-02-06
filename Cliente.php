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
        return [
            new Cliente('Albo Vieira', '444444333-75', 'Rua Anna Maria de Jesus', '313333-3333','Joao'),
            new Cliente('Vitor Joao', '888444333-90', 'Rua Souza numero 3', '313333-3333','Carlos'),
            new Cliente('Camila Elias', '888444333-90', 'Rua Souza numero 3', '313333-3333','Milton'),
            new Cliente('Alvara Borges', '888444333-90', 'Rua Souza numero 3', '313333-3333','Jose'),
            new Cliente('William Mendes', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            new Cliente('Carol Silva', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            new Cliente('Tais Carla', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            new Cliente('Pedro Dias', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
            new Cliente('Joana Bittencout', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao'),
        ];
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