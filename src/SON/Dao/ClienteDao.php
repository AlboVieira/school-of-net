<?php
/**
 * Created by PhpStorm.
 * User: albov
 * Date: 15/02/2016
 * Time: 21:08
 */

namespace SON\Dao;


use SON\Cliente\AbstractCliente;
use SON\Cliente\TipoCliente\ClientePessoaFisica;

class ClienteDao
{
    /** @var  \PDO */
    private $pdo;
    /** @var  AbstractCliente[] */
    private $clientes;

    /**
     * ClienteDao constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function persist(AbstractCliente $cliente){
        $this->clientes[] = $cliente;
        return $this;
    }

    public function flush(){
        foreach($this->clientes as $cliente){

            $stmt = $this->pdo->prepare(
                "INSERT INTO clientes_poo(
                    nome,nome_empresa,tipo_cliente, endereco, nvlImportancia, telefone,
                    endereco_cobranca,cpf,cnpj,filiacao)
                    VALUES(:nome, :nomeEmpresa,:tipoCliente,:endereco, :nvlImportancia, :telefone,:enderecoCobranca, :cpf, :cnpj,:filiacao)");


            $stmt->bindValue(":tipoCliente", $cliente->getTipoCliente());
            $stmt->bindValue(":endereco", $cliente->getEndereco());
            $stmt->bindValue(":nvlImportancia", $cliente->getNvlImportancia());
            $stmt->bindValue(":telefone", $cliente->getTelefone());

            if($cliente->getEnderecoCobranca()){
                $stmt->bindValue(":enderecoCobranca", $cliente->getEnderecoCobranca());
            }else{
                $stmt->bindValue(":enderecoCobranca", null);
            }

            if($cliente instanceof ClientePessoaFisica){
                $stmt->bindValue(":cpf", $cliente->getCpf());
                $stmt->bindValue(":cnpj", null);
                $stmt->bindValue(":nome", $cliente->getNome());
                $stmt->bindValue(":nomeEmpresa", null);
                $stmt->bindValue(":filiacao", $cliente->getFiliacao());

            }else{
                $stmt->bindValue(":cnpj", $cliente->getCnpj());
                $stmt->bindValue(":cpf", null);

                $stmt->bindValue(":nomeEmpresa", $cliente->getNomeEmpresa());
                $stmt->bindValue(":nome", null);
                $stmt->bindValue(":filiacao", null);
            }
            $stmt->execute();
        }
    }

    public function findAll($orderBy = 'ASC'){
        $consulta = $this->pdo->query("SELECT * FROM clientes_poo ORDER by id $orderBy");
        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }

}