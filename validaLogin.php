<?php

if (isset($_SESSION['LOGADO'])) { //verifica se a sessão já não estava aberta e destrói a sessão
    session_start();
    $_SESSION = array();
    session_unset();
    session_destroy();
}

$login = $_POST['usuario'];
$pass = $_POST['senha'];

$sql = "SELECT * FROM login where nome = '$login' and senha = '$pass'";

$statement = $pdo->query($sql);
$resultadoLogin = $statement->fetch();

$resultadoLogin ? $_SESSION['LOGADO'] = 'verdade' &&  header("location: index.php") : header("location: logoff.php");















