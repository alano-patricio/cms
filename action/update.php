<?php

include '../banco/conectaBanco.php';
include '../funcoes.php';
session_start();

if (isset($_POST['EditarNoticia'])) {

    if ($_FILES['EditaImagemNoticia']['name']) {
        $imagem = "data:" . $_FILES['EditaImagemNoticia']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['EditaImagemNoticia']['tmp_name']));
    } else {
        $imagem = $_POST['imagemSemAlteracao'];
    }

    $editarNoticia = $pdo->prepare("UPDATE noticia SET `titulo`=:titulo, `texto`=:texto, `imagem`=:imagem, `data_inicial`=:data_inicial, `data_final`=:data_final, `data_cadastro`=:data_cadastro, `autor`=:autor WHERE `id`=:id");
    $editarNoticia->bindValue(':titulo', $_POST['AddTituloNoticia'], PDO::PARAM_STR);
    $editarNoticia->bindValue(':texto', $_POST['AddNoticiaNoticia'], PDO::PARAM_STR);
    $editarNoticia->bindValue(':imagem', $imagem, PDO::PARAM_STR);
    $editarNoticia->bindValue(':data_inicial', dateEmMysql($_POST['AddDataInNoticia']), PDO::PARAM_STR);
    $editarNoticia->bindValue(':data_final', dateEmMysql($_POST['AddDataOutNoticia']), PDO::PARAM_STR);
    $editarNoticia->bindValue(':data_cadastro', dateEmMysql($_POST['AddDataCadastrada']), PDO::PARAM_STR);
    $editarNoticia->bindValue(':autor', $_SESSION['usuario'], PDO::PARAM_STR);
    $editarNoticia->bindValue(':id', $_POST['idDaNoticia'], PDO::PARAM_INT);
    $editarNoticia->execute();
    header('location: ../index.php');
    //
} elseif (isset($_POST['editarAviso'])) {

    $editarAviso = $pdo->prepare("UPDATE aviso SET `aviso`=:aviso, `data_cadastro`=:data_cadastro, `data_inicial`=:data_inicial, `data_final`=:data_final, `autor`=:autor where id=:id");
    $editarAviso->bindValue(':aviso', $_POST['AddTituloAviso'], PDO::PARAM_STR);
    $editarAviso->bindValue(':data_cadastro', dateEmMysql($_POST['AddDataCadastroAviso']), PDO::PARAM_STR);
    $editarAviso->bindValue(':data_inicial', dateEmMysql($_POST['AddDataInAviso']), PDO::PARAM_STR);
    $editarAviso->bindValue(':data_final', dateEmMysql($_POST['AddDataOutAviso']), PDO::PARAM_STR);
    $editarAviso->bindValue(':autor', $_SESSION['usuario'], PDO::PARAM_STR);
    $editarAviso->bindValue(':id', $_POST['idDoAviso'], PDO::PARAM_INT);
    $editarAviso->execute();

    header('location: ../index.php');
} 
