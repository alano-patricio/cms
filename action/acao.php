<?php include '../banco/conectaBanco.php';
$titulo = $_POST['AddTituloNoticia'];
$dataIn = $_POST['AddDataEntrarNoAr'];
$dataOut = $_POST['AddDataSairDoAr'];
$imagem = $_POST['AddImagemNoticia'];
$noticia = $_POST['AddNoticiaNoticia'];
$ativo = $_POST['AddAtivoNoticia'];

$sql = "INSERT INTO NOTICIA (`titulo`, `texto`, `imagem`, `data_inicial`, `data_final`) VALUES ('$titulo', '$noticia', '$imagem', '$dataIn', '$dataOut', '$ativo')";
$statement = $pdo->query($sql);
$statement->execute();
$statement->closeCursor();
?>