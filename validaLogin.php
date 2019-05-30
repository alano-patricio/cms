<?php

include 'banco/conectaBanco.php';

$buscaUsuario = $pdo->prepare("SELECT * from login where nome = :usuario and senha = :password ");
$buscaUsuario->bindValue(':usuario', $_POST['usuario'], PDO::PARAM_STR);
$buscaUsuario->bindValue(':password', $_POST['senha'], PDO::PARAM_STR);
$buscaUsuario->execute();
$obtemNivelUsuario = $buscaUsuario->fetch();

echo $obtemNivelUsuario['nivel'];

if ($obtemNivelUsuario) {
    session_start();
    $_SESSION['usuario'] = $obtemNivelUsuario['nome_completo'];
    $_SESSION['nivel'] = $obtemNivelUsuario['nivel'];
    header("location: index.php");
} else {
    echo "Usuário Inválido!";
    header("location: login.php");
}