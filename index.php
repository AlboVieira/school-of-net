<?php
require_once 'Autoload.php';

$clienteDao = new \SON\Cliente\ClienteDao();
$listaClientes = $clienteDao->findAllClientes();

$ordenarValue = 'DESC';
$ordenarLabel = 'Descendente';

if(isset($_GET['ordenacao'])){

    if($_GET['ordenacao'] == 'ASC'){
        $ordenarValue = 'DESC';
        $ordenarLabel = 'Descendente';
    }else{
        $ordenarValue = 'ASC';
        $ordenarLabel = 'Ascendente';
    }
    $listaClientes = $clienteDao->findAllClientes($_GET['ordenacao']);
}

require_once "template".DIRECTORY_SEPARATOR."header.php";
?>


<!-- Page Content -->
<div class="container">
    <style>
        th{text-align: center}
    </style>
    <div class="row">
        <div class="col-lg-12 text-left">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Documento</th>
                    <th>Endereco</th>
                    <th>Tipo</th>
                    <th>Acao</th>
                </tr>
                <tr>
                    <form method="get">
                        <input type="hidden" name="ordenacao" value="<?php echo $ordenarValue ?>" />
                        <button type='submit' class='btn btn-success btn-sm'><?php echo $ordenarLabel ?></button>
                    </form>
                    <?php
                    /** @var SON\Cliente\AbstractCliente $cliente */
                    foreach($listaClientes as $key=>$cliente){
                        //var_dump($cliente);die;
                        $filiacao = '';
                        if($cliente['tipo_cliente'] == \SON\Cliente\TipoCliente\ClientePessoaFisica::PESSOA_FISICA){
                            $nome = $cliente['nome'];
                            $documento = $cliente['cpf'];
                            $filiacao = "<br><strong>Filiacao:</strong> {$cliente['filiacao']} <br>";
                        }else{
                            $nome = $cliente['nome_empresa'];
                            $documento = $cliente['cnpj'];
                        }
                        $tipoCliente = \SON\Cliente\AbstractCliente::getLabelTipoCliente($cliente['tipo_cliente']);

                        $enderecoCobranca = '';
                        if($cliente['endereco_cobranca']){
                            $enderecoCobranca = "<strong>Endereco de Cobranca:</strong> {$cliente['endereco_cobranca']}";
                        }

                        echo "<tr><td>{$cliente['id']}</td>";
                        echo "<td>{$nome}</td>";
                        echo "<td>{$documento}</td>";
                        echo "<td>{$cliente['endereco']}</td>";
                        echo "<td>".$tipoCliente."</td>";
                        echo "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal{$cliente['id']}'>Ver Detalhes</button></td>";

                        echo "<div class='modal fade' id='myModal{$cliente['id']}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                                  <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                      <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                        <h4 class='modal-title' id='myModalLabel'>Detalhes</h4>
                                      </div>
                                      <div class='modal-body'>
                                        <strong>Telefone :</strong> {$cliente['telefone']} <br>
                                        <strong>Nivel de importancia :</strong> {$cliente['nvlImportancia']}<br>
                                        {$enderecoCobranca}
                                        {$filiacao}
                                      </div>
                                      <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        <button type='button' class='btn btn-primary'>Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>";
                        echo '</tr>';
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
