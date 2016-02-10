<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 05/02/2016
 * Time: 22:27
 */
namespace SON\Cliente;

abstract class AbstractCliente
{
    protected $endereco;
    protected $enderecoCobranca;
    protected $telefone;
    protected $nvlImportancia;

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
    public function getEnderecoCobranca()
    {
        return $this->enderecoCobranca;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @return mixed
     */
    public function getNvlImportancia()
    {
        return $this->nvlImportancia;
    }


}