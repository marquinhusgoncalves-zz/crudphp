<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao();
    $con->connect();

    $crud = new crud('produto');
    $id = $_GET['id'];
    $crud->excluir("id = $id");

    $con->disconnect();

    header("Location: index.php"); 
?>