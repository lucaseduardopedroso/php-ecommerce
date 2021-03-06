<?php
    //Verifica se o usuário está autenticado
    if(!isset($page)){
        exit;
    }

    $nome = NULL;

    if(!empty($id)){
        $sql = "select * from categoria where id = :id limit 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consuta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        $id = $dados->id ?? NULL;
        $nome = $dados->nome ?? NULL;
    }

?>

<div class="card">
    <div class="card-header">
        <h2 class="float-left">Cadastro de Categoria</h2> 
        <div class="float-right">
            <a href="listar/categorias" title="Listar Categorias" class="btn btn-success">
                Listar Categorias
            </a>
        </div>
    </div>
    <div class="card-body">
        <form name="formCadastro" method="post" action="salvar/categorias" data-parsley-validate="">
            <label for="id">ID da Categoria:</label>
            <input type="text" readonly name="id" id="id" class="form-control" value="<?=$id?>">
            <label for="nome">Nome da Categoria:</label>
            <input type="text" name="nome" id="nome" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?=$nome?>">
            <br>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> Salvar Dados
            </button>
        </form>
    </div>
</div>