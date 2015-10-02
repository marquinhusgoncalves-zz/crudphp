<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    </head>
    <body>
        <?php
            if($con->connect() == true){
                echo 'Conectou';
            }else{
                echo 'Não conectou';
            }
        ?>
        <a class="pure-button" href="formulario.php">Novo</a>

        <table class="pure-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = mysql_query("SELECT * FROM produto");
                    while($campo = mysql_fetch_array($consulta)){
                ?>
                    <tr>
                        <td><?php echo $campo['nome']; ?></td>
                        <td><?php echo $campo['descricao']; ?></td>
                        <td><a class="pure-button" href="formulario.php?id=<?php echo $campo['id']; ?>">Editar</a>
                        </td>
                        <td><a class="pure-button" href="excluir.php?id=<?php echo $campo['id'];  ?>">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
<?php $con->disconnect(); ?>