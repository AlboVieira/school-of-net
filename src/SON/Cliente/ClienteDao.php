<?php
/**
 * Created by PhpStorm.
 * User: albov
 * Date: 12/02/2016
 * Time: 21:50
 */

namespace SON\Cliente;

use SON\Cliente\TipoCliente\ClientePessoaFisica;
use SON\Cliente\TipoCliente\ClientePessoaJuridica;
use SON\Dao\AbstractDao;

class ClienteDao extends AbstractDao
{
    private $cliente;
    private $operacao;
    private $status;

    /**
     * ClienteDao constructor.
     * @param $clientePost
     */
    public function __construct($clientePost = null)
    {
        parent::__construct();
        if($clientePost){
            $this->bindCliente($clientePost);
        }
        $this->status = false;
        switch($this->operacao){
            case AbstractDao::INSERT:
                $this->status = $this->insert();
                break;
            case AbstractDao::UPDATE:
                break;
            case AbstractDao::DELETE:
                break;
        }
    }

    public function findAllClientes($orderBy = 'ASC'){
        $this->setSql("SELECT * FROM clientes_poo ORDER by id $orderBy");
        return $this->findAll();
    }

    public function bindCliente($post){

        if($post['tipo'] == ClientePessoaFisica::PESSOA_FISICA){

            if($post['id']){
                $this->operacao = AbstractDao::UPDATE;
            }else{
                $this->cliente = new ClientePessoaFisica();
                $this->cliente->setNome($post['nome']);
                $this->cliente->setCpf($post['cpf']);
                $this->cliente->setFiliacao($post['filiacao']);
                $this->cliente->setNvlImportancia($post['nvlImportancia']);
                $this->cliente->setTelefone($post['telefone']);
                $this->cliente->setEndereco($post['endereco']);

                if(!empty($post['enderecoCobranca'])){
                    $this->cliente->setEnderecoCobranca($post['enderecoCobranca']);
                }
                $this->operacao = AbstractDao::INSERT;
            }
        }
        else {

            if($post['id']){

                $this->operacao = AbstractDao::UPDATE;
            }else{
                $this->cliente = new ClientePessoaJuridica();
                $this->cliente->setNomeEmpresa($post['nomeEmpresa']);
                $this->cliente->setCnpj($post['cnpj']);
                $this->cliente->setNvlImportancia($post['nvlImportancia']);
                $this->cliente->setTelefone($post['telefone']);
                $this->cliente->setEndereco($post['endereco']);

                if(!empty($post['enderecoCobranca'])){
                    $this->cliente->setEnderecoCobranca($post['enderecoCobranca']);
                }

                $this->operacao = AbstractDao::INSERT;
            }
        }
    }

    public function insert(){
        $cliente = $this->cliente;
        $tipoCliente = $cliente->getTipoCliente();
        if($tipoCliente == ClientePessoaFisica::PESSOA_FISICA){
            $sql = "INSERT INTO clientes_poo
                    ({$this->getFieldsPessoaFisica()})
                    VALUES
                    ({$this->getValuesPessoaFisica()})";

            $this->setSql($sql);
        }else{
            $sql = "INSERT INTO clientes_poo
                    ({$this->getFieldsPessoaJuridica()})
                    VALUES
                    ({$this->getValuesPessoaJuridica()})";

            $this->setSql($sql);
        }
        return $this->flush();
    }

    public static function getFieldsPessoaFisica(){
        $fields = ['id',
            'nome',
            'tipo_cliente',
            'cpf',
            'filiacao',
            'endereco',
            'nvlImportancia',
            'telefone',
            'endereco_cobranca'];
        return implode(',',$fields);
    }

    public function getValuesPessoaFisica(){
        $values = [
            "'{$this->cliente->getId()}'",
            "'{$this->cliente->getNome()}'",
            "'{$this->cliente->getTipoCliente()}'",
            "'{$this->cliente->getCpf()}'",
            "'{$this->cliente->getFiliacao()}'",
            "'{$this->cliente->getEndereco()}'",
            "'{$this->cliente->getNvlImportancia()}'",
            "'{$this->cliente->getTelefone()}'",
            "'{$this->cliente->getEnderecoCobranca()}'"
        ];
        return implode(',',$values);
    }

    public static function getFieldsPessoaJuridica(){
        $fields = ['id',
            'nome_empresa',
            'tipo_cliente',
            'cnpj',
            'endereco',
            'nvlImportancia',
            'telefone',
            'endereco_cobranca'];
        return implode(',',$fields);
    }

    public function getValuesPessoaJuridica(){
        $values = [
            "'{$this->cliente->getId()}'",
            "'{$this->cliente->getNomeEmpresa()}'",
            "'{$this->cliente->getTipoCliente()}'",
            "'{$this->cliente->getCnpj()}'",
            "'{$this->cliente->getEndereco()}'",
            "'{$this->cliente->getNvlImportancia()}'",
            "'{$this->cliente->getTelefone()}'",
            "'{$this->cliente->getEnderecoCobranca()}'"
        ];
        return implode(',',$values);
    }

    public function getClienteInstance(){
        return $this->cliente;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setOperacao($operacao){
        $this->operacao = $operacao;
    }

}