<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 05/02/2016
 * Time: 22:27
 */
namespace SON\Cliente\TipoCliente;

use SON\Cliente\AbstractCliente;

class ClientePessoaJuridica extends AbstractCliente
{
    const PESSOA_JURIDICA = 'J';
    private $cnpj;
    private $nomeEmpresa;
    private $tipoCliente = 'J';

    /**
     * Cliente constructor.
     * @param $nome
     * @param $cpf
     * @param $endereco
     * @param $telefone
     */
    public function __construct($nomeEmpresa = null, $cnpj = null, $endereco = null, $telefone = null,
                                $nvlImportancia=null,$enderecoCobranca=null)
    {
        $this->nomeEmpresa = !is_null($nomeEmpresa) ? $nomeEmpresa : null;
        $this->cnpj = !is_null($cnpj) ? $cnpj: null;
        $this->endereco = !is_null($endereco) ? $endereco : null;
        $this->telefone = !is_null($telefone) ? $telefone : null;
        $this->nvlImportancia = !is_null($nvlImportancia) ? $nvlImportancia: null;
        $this->enderecoCobranca = !is_null($enderecoCobranca) ? $enderecoCobranca : null;
    }

    /**
     * @return null
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param null $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return null
     */
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    /**
     * @param null $nomeEmpresa
     */
    public function setNomeEmpresa($nomeEmpresa)
    {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    /**
     * @return string
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }
    }