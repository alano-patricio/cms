<?php
include 'menu.php';
include 'banco/conectaBanco.php';
include 'topo.php';
if (isset($_GET['idDaNoticia'])) {
    include 'funcoes.php';

    $statement = $pdo->prepare("SELECT * FROM noticia where id=:id");
    $statement->bindValue(':id', $_GET['idDaNoticia'], PDO::PARAM_INT);
    $statement->execute();
    $buscaNoticia = $statement->fetch();
    $statement->closeCursor();
    ?>

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="col-md-offset-2">
                        <h2 class="text-center text-capitalize"><b><?php echo $buscaNoticia['titulo'] ?></b></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-offset-2">
                        <img src="<?php echo $buscaNoticia['imagem'] ?>" class="img-responsive apresentacaoNoticia">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <p class="pull-right correcaoDataNoticia"><?php echo dataEmPhp($buscaNoticia['data_cadastro']) ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="col-md-offset-2">
                        <div class="text-center">
                            <p><?php echo $buscaNoticia['texto'] ?></p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><?php
} else {
    header('location: logoff.php');
}
?>

