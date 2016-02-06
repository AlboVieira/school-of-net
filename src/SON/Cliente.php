<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 05/02/2016
 * Time: 22:27
 */
namespace SON;

class Cliente
{
    private $nome;
    private $cpf;
    private $endereco;
    private $enderecoCobrança;
    private $telefone;
    private $filiacao;
    private $tipoCliente;
    private $nvlImportancia;
    const PESSOA_FISICA = 'F';
    const PESSOA_JURIDICA = 'J';

    /**
     * Cliente constructor.
     * @param $nome
     * @param $cpf
     * @param $endereco
     * @param $telefone
     */
    public function __construct($nome = null, $cpf = null, $endereco = null, $telefone = null,
                                $filiacao=null,$tipoCliente=null,$nvlImportancia=null,$enderecoCobranca=null)
    {
        $this->nome = !is_null($nome) ? $nome : null;
        $this->cpf = !is_null($cpf) ? $cpf : null;
        $this->endereco = !is_null($endereco) ? $endereco : null;
        $this->telefone = !is_null($telefone) ? $telefone : null;
        $this->filiacao = !is_null($filiacao) ? $filiacao: null;
        $this->tipoCliente = !is_null($tipoCliente) ? $tipoCliente: null;
        $this->nvlImportancia = !is_null($nvlImportancia) ? $nvlImportancia: null;
        $this->enderecoCobrança = !is_null($enderecoCobranca) ? $enderecoCobranca : null;
    }

    public function getList(){
        $list = [
            1 => new Cliente('Albo Vieira', '444444333-75', 'Rua Anna Maria de Jesus', '313333-3333','Joao', self::PESSOA_FISICA,1,'rua souza pinto '),
            2 => new Cliente('Vitor Joao', '888444333-90', 'Rua Souza numero 3', '313333-3333','Carlos', self::PESSOA_JURIDICA,2,'rua carlos pereira'),
            3 => new Cliente('Camila Elias', '888444333-90', 'Rua Souza numero 3', '313333-3333','Milton',self::PESSOA_JURIDICA,5),
            4 => new Cliente('Alvara Borges', '888444333-90', 'Rua Souza numero 3', '313333-3333','Jose',self::PESSOA_FISICA,3),
            5 => new Cliente('William Mendes', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',self::PESSOA_JURIDICA,4,'rua joao bonifacio '),
            6 => new Cliente('Carol Silva', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',self::PESSOA_FISICA,1),
            7 => new Cliente('Tais Carla', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',self::PESSOA_FISICA,2,'avenida afonso pena '),
            8 => new Cliente('Pedro Dias', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',self::PESSOA_FISICA,4),
            9 => new Cliente('Joana Bittencout', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',self::PESSOA_FISICA,4),
            10 => new Cliente('Otavio Souza', '888444333-90', 'Rua Souza numero 3', '313333-3333','Joao',self::PESSOA_FISICA,5),
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

    public static function getLabelTipoCliente($key){
        $tipos = [self::PESSOA_FISICA => 'Pessoa Fisica',self::PESSOA_JURIDICA => 'Pessoa Juridica'];
        return $tipos[$key];
    }

    public function isPessoaFisica(){
        return $this->tipoCliente == self::PESSOA_FISICA;
    }
    public function isPessoaJurifica(){
        return $this->tipoCliente == self::PESSOA_JURIDICA;
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

    /**
     * @return null
     */
    public function getEnderecoCobrança()
    {
        return $this->enderecoCobrança;
    }

    /**
     * @return null
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }

    /**
     * @return null
     */
    public function getNvlImportancia()
    {
        return $this->nvlImportancia;
    }
}