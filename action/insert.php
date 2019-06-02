<?php

include '../banco/conectaBanco.php';
include '../funcoes.php';

if (isset($_POST['InserirNoticia'])) {
    $imagem = "data:" . $_FILES['AddImagemNoticia']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['AddImagemNoticia']['tmp_name']));

    $inserirNovaNoticia = $pdo->prepare("INSERT INTO noticia (`titulo`, `texto`, `imagem`, `data_inicial`, `data_final`, `data_cadastro`, `autor`) VALUES (:titulo, :texto, :imagem, :data_inicial, :data_final, :data_cadastro, :autor )");
    $inserirNovaNoticia->bindValue(':titulo', $_POST['AddTituloNoticia'], PDO::PARAM_STR);
    $inserirNovaNoticia->bindValue(':texto', $_POST['AddNoticiaNoticia'], PDO::PARAM_STR);
    $inserirNovaNoticia->bindValue(':imagem', $imagem, PDO::PARAM_STR);
    $inserirNovaNoticia->bindValue(':data_inicial', dateEmMysql($_POST['AddDataInNoticia']), PDO::PARAM_STR);
    $inserirNovaNoticia->bindValue(':data_final', dateEmMysql($_POST['AddDataOutNoticia']), PDO::PARAM_STR);
    $inserirNovaNoticia->bindValue(':data_cadastro', dateEmMysql($_POST['AddDataCadastrada']), PDO::PARAM_STR);
    $inserirNovaNoticia->bindValue(':autor', $_POST['AddAutorNoticia'], PDO::PARAM_STR);
    $inserirNovaNoticia->execute();

    header('location: ../index.php');
} elseif (isset($_POST['InserirAviso'])) {
    $inserirNovoAviso = $pdo->prepare("INSERT INTO aviso (`aviso`, `data_cadastro`, `data_inicial`, `data_final`, `autor`) VALUES (:aviso, :data_cadastro, :data_inicial, :data_final, :autor)");
    $inserirNovoAviso->bindValue(':aviso', $_POST['AddTituloAviso'], PDO::PARAM_STR);
    $inserirNovoAviso->bindValue(':data_cadastro', dateEmMysql($_POST['AddDataCadastroAviso']), PDO::PARAM_STR);
    $inserirNovoAviso->bindValue(':data_inicial', dateEmMysql($_POST['AddDataInAviso']), PDO::PARAM_STR);
    $inserirNovoAviso->bindValue(':data_final', dateEmMysql($_POST['AddDataOutAviso']), PDO::PARAM_STR);
    $inserirNovoAviso->bindValue(':autor', $_POST['AddAutorAviso'], PDO::PARAM_STR);
    $inserirNovoAviso->execute();

    header('location: ../index.php');
}
?>