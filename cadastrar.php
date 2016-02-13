<?php
require_once 'Autoload.php';

$classSuccess = 'hide';
$classFailure = 'hide';
if(isset($_POST['submit'])){
    $clienteDao = new \SON\Cliente\ClienteDao($_POST);
    $status = $clienteDao->getStatus();
    if($status){
        $classSuccess = 'show';
        $classFailure = 'hide';
    }else{
        $classSuccess = 'hide';
        $classFailure = 'show';
    }
}

require_once "template".DIRECTORY_SEPARATOR."header.php";

?>

<div class="container">

    <div class="col-md-12">
        <div class="alert alert-success <?php echo $classSuccess ?>">
            <strong><span class="glyphicon glyphicon-ok"></span>Operacao realizada com sucesso</strong>
        </div>
        <div class="alert alert-danger <?php echo $classFailure ?>">
            <span class="glyphicon glyphicon-remove"></span><strong>Ocorreu um erro ao realizar a operacao</strong>
        </div>
    </div>
    <div class="well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campo Obrigatorio</strong></div>

    <div class="row">
        <div class="col-lg-6">
            <form name="pessoaFisica" method="post" role="form">
                <input type="hidden" name="id">
                <input type="hidden" name="tipo" value="F">
                    <div class="well well-sm"></span><h4>Cadastro Pessoa Fisica</h4></div>

                    <div class="form-group">
                        <label for="InputName">Nome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">CPF</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputMessage">Nivel Importancia</label>
                        <div class="input-group">
                            <input type="text" name="nvlImportancia" id="nvlImportancia" class="form-control" required />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Filiacao</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="filiacao" name="filiacao" placeholder="Filiacao" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputMessage">Telefone</label>
                        <div class="input-group">
                            <input type="text" name="telefone" id="telefone" class="form-control" required />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputMessage">Endereco</label>
                        <div class="input-group">
                            <input type="text" name="endereco" id="endereco" class="form-control" required />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputMessage">Endereco Cobranca</label>
                        <div class="input-group">
                            <input type="text" name="enderecoCobranca" id="enderecoCobranca" class="form-control" />
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" value="Salvar" class="btn btn-info pull-right">
                </form>
        </div>

        <div class="col-lg-6">
            <form name="pessoaJuridica" method="post" role="form">
                <input type="hidden" name="id">
                <input type="hidden" name="tipo" value="J">
                <div class="well well-sm"></span><h4>Cadastro Pessoa Juridica</h4></div>
                <div class="form-group">
                    <label for="InputName">Nome Empresa</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nomeEmpresa" id="nomeEmpresa" placeholder="Digite o nome da Empresa" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">CNPJ</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Nivel Importancia</label>
                    <div class="input-group">
                        <input type="text" name="nvlImportancia" id="nvlImportancia" class="form-control" required />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Telefone</label>
                    <div class="input-group">
                        <input name="telefone" id="telefone" class="form-control" required />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputMessage">Endereco</label>
                    <div class="input-group">
                        <input name="endereco" id="endereco" class="form-control" required />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputMessage">Endereco Cobranca</label>
                    <div class="input-group">
                        <input name="enderecoCobranca" id="enderecoCobranca" class="form-control"  />
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" value="Salvar" class="btn btn-info pull-right">
            </form>
        </div>
        <!-- -->

    </div>
</div><!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

f<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
