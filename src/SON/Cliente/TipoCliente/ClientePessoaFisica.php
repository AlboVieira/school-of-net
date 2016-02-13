<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 05/02/2016
 * Time: 22:27
 */
namespace SON\Cliente\TipoCliente;

use SON\Cliente\AbstractCliente;

class ClientePessoaFisica extends AbstractCliente
{
    const PESSOA_FISICA = 'F';
    private $nome;
    private $cpf;
    private $filiacao;
    private $tipoCliente = 'F';

    public function __construct($nome = null, $cpf = null, $endereco = null, $telefone = null,
                                $filiacao=null,$nvlImportancia=null,$enderecoCobranca=null)
    {
        $this->nome = !is_null($nome) ? $nome : null;
        $this->cpf = !is_null($cpf) ? $cpf : null;
        $this->endereco = !is_null($endereco) ? $endereco : null;
        $this->telefone = !is_null($telefone) ? $telefone : null;
        $this->filiacao = !is_null($filiacao) ? $filiacao: null;
        $this->nvlImportancia = !is_null($nvlImportancia) ? $nvlImportancia: null;
        $this->enderecoCobranca = !is_null($enderecoCobranca) ? $enderecoCobranca : null;
    }

    /**
     * @return null
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param null $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return null
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param null $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return null
     */
    public function getFiliacao()
    {
        return $this->filiacao;
    }

    /**
     * @param null $filiacao
     */
    public function setFiliacao($filiacao)
    {
        $this->filiacao = $filiacao;
    }

    /**
     * @return string
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }

}