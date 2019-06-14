<?php

include '../banco/conectaBanco.php';
include '../funcoes.php';
session_start();

if (isset($_POST['excluirUsuario'])) {
    $deletarUsuario = $pdo->prepare("DELETE from usuarios where id=:id");
    $deletarUsuario->bindValue(':id', $_POST['excluirUsuario'], PDO::PARAM_INT);
    $deletarUsuario->execute();
    header('location: ../usuarios.php');
}

