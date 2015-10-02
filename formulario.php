<?php
require_once 'config/conexao.class.php';
require_once 'config/crud.class.php';

    $con = new conexao();
    $con->connect();
    @$getId = $_GET['id'];
    if(@$getId){
        $consulta = mysql_query("SELECT * FROM produto WHERE id = + $getId");
        $campo = mysql_fetch_array($consulta);
    }
    
    if(isset ($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $crud = new crud('produto');
        $crud->inserir("nome,descricao", "'$nome','$descricao'");
        header("Location: index.php");
    }

    if(isset ($_POST['editar'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $crud = new crud('produto');
        $crud->atualizar("nome='$nome',descricao='$descricao'", "id='$getId'");
        header("Location: index.php");
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    </head>
    <body>
        <form action="" method="post">

            <form action="" method="post" class="pure-form">
                <fieldset>
                    <legend>CRUD PHP</legend>
                    <label>Nome:</label>
                    <input type="text" name="nome" value="<?php echo @$campo['nome']; ?>" >
                    <label>Descrição:</label>
                    <input type="text" name="descricao" value="<?php echo @$campo['descricao']; ?>">

                </fieldset>
            <?php
                if(@!$campo['id']){ // se nao passar o id via GET nao está editando, mostra o botao de cadastro
                    ?>
                    <button class="pure-button pure-button-primary" type="submit" name="cadastrar">Cadastrar</button>
                    <?php }else{ // se  passar o id via GET  está editando, mostra o botao de ediçao ?>
                    <button class="pure-button pure-button-primary" type="submit" name="editar">Editar</button>
                    <?php } ?>
                </form>
            </body>
            </html>
            <?php $con->disconnect(); ?>









