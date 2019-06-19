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
//
} elseif (isset($_POST['alteraEmpresa'])) {
    
    if ($_FILES['EditaImagemEmpresa']['name']) {
        $logo = "data:" . $_FILES['EditaImagemEmpresa']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['EditaImagemEmpresa']['tmp_name']));
    } else {
        $sqlBuscarImagemEmpresa = ("SELECT logo FROM cadastro_cliente WHERE id = 0");
        $statement = $pdo->query($sqlBuscarImagemEmpresa);
        $recebeLogoEmpresa = $statement->fetch();
        $logo = $recebeLogoEmpresa['logo'];
    }

    $editarEmpresa = $pdo->prepare("UPDATE cadastro_cliente SET `nome`=:nome, `telefone`=:telefone, `email`=:email, `logo`=:logo where id=0");
    $editarEmpresa->bindValue(':nome', $_POST['nomeEmpresa'], PDO::PARAM_STR);
    $editarEmpresa->bindValue(':telefone', $_POST['telefoneEmpresa'], PDO::PARAM_STR);
    $editarEmpresa->bindValue(':email', $_POST['emailEmpresa'], PDO::PARAM_STR);
    $editarEmpresa->bindValue(':logo', $logo, PDO::PARAM_STR);
    $editarEmpresa->execute();
    header('location: ../index.php');
//
} elseif (isset($_POST['alterarDadosUsuario'])) {
    $editarUsuario = $pdo->prepare("UPDATE usuarios SET `nome`=:nome, `senha`=:senha, `nivel`=:nivel, `nome_completo`=:nome_completo where id=:id");
    $editarUsuario->bindValue(':nome', $_POST['nomeUsuario'], PDO::PARAM_STR);
    $editarUsuario->bindValue(':senha', $_POST['senhaUsuario'], PDO::PARAM_STR);
    $editarUsuario->bindValue(':nivel', $_POST['nivelUsuario'], PDO::PARAM_STR);
    $editarUsuario->bindValue(':nome_completo', $_POST['nomeCompletoUsuario'], PDO::PARAM_STR);
    $editarUsuario->bindValue(':id', $_POST['idDoUsuario'], PDO::PARAM_INT);
    $editarUsuario->execute();
    header('location: ../usuarios.php');
}





