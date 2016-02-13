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

abstract class AbstractCliente
{
    protected $id;
    protected $endereco;
    protected $enderecoCobranca;
    protected $telefone;
    protected $nvlImportancia;

    public static function getLabelTipoCliente($tipoCliente){
        $tipos = [
           ClientePessoaFisica::PESSOA_FISICA => 'Pessoa Fisica',
            ClientePessoaJuridica::PESSOA_JURIDICA => 'Pessoa Juridica'
        ];
        return $tipos[$tipoCliente];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getEnderecoCobranca()
    {
        return $this->enderecoCobranca;
    }

    /**
     * @param mixed $enderecoCobranca
     */
    public function setEnderecoCobranca($enderecoCobranca)
    {
        $this->enderecoCobranca = $enderecoCobranca;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getNvlImportancia()
    {
        return $this->nvlImportancia;
    }

    /**
     * @param mixed $nvlImportancia
     */
    public function setNvlImportancia($nvlImportancia)
    {
        $this->nvlImportancia = $nvlImportancia;
    }

}