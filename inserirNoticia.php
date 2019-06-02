<?php
include 'menu.php';
include 'banco/conectaBanco.php';
include 'topo.php';
include 'funcoes.php';

if (isset($_POST['idNoticia'])) {
    $buscarNoticiaParaEditar = $pdo->prepare("SELECT * FROM noticia where id = :id");
    $buscarNoticiaParaEditar->bindValue(':id', $_POST['idNoticia'], PDO::PARAM_INT);
    $buscarNoticiaParaEditar->execute();
    $recebeNoticiaParaEditar = $buscarNoticiaParaEditar->fetch();
}
?>



<div class=" container-fluid">
    <div class="row">
        <div class=" col-md-6 col-md-offset-3">
            <?php if (isset($_POST['idNoticia'])) { ?>
                <form action="action/update.php" method="POST" enctype="multipart/form-data"> 
                <?php } else { ?>
                    <form action="action/insert.php" method="POST" enctype="multipart/form-data"> 
                    <?php } ?>
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="AddTituloNoticia" class="form-control" value="<?php echo isset($recebeNoticiaParaEditar['titulo']) ? $recebeNoticiaParaEditar['titulo'] : "" ?>">
                    </div>
                    <div class="form-group">
                        <label>Data de cadastro</label>
                        <input type="datetime" name="AddDataCadastrada" readonly class="form-control" value="<?php echo isset($recebeNoticiaParaEditar['data_cadastro']) ? dataEmPhp($recebeNoticiaParaEditar['data_cadastro']) : date("d/m/Y H:i:s") ?>">
                    </div>
                    <div class="form-group">
                        <label>Inicio da Noticia</label>
                        <input type="datetime" name="AddDataInNoticia" class="form-control" value="<?php echo isset($recebeNoticiaParaEditar['data_inicial']) ? dataEmPhp($recebeNoticiaParaEditar['data_inicial']) : date("d/m/Y H:i:s") ?>">
                    </div>
                    <div class="form-group">
                        <label>Termino da Noticia</label>
                        <input type="datetime" name="AddDataOutNoticia" class="form-control" value="<?php echo isset($recebeNoticiaParaEditar['data_final']) ? dataEmPhp($recebeNoticiaParaEditar['data_final']) : date("d/m/Y H:i:s") ?>">
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <?php if (isset($_POST['idNoticia'])) { ?>
                        <input type="file" class="btn btn-primary" name="EditaImagemNoticia">
                        <?php } else { ?>
                            <input type="file" required class="btn btn-primary" name="AddImagemNoticia">
                        <?php } ?>

                    </div>
                    <div class="form-group">
                        <label>Noticia</label>
                        <textarea class="form-control" name="AddNoticiaNoticia" rows="7"><?php echo isset($recebeNoticiaParaEditar['texto']) ? $recebeNoticiaParaEditar['texto'] : ""; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <input type="text" readonly name="AddAutorNoticia" class="form-control" value="<?php echo isset($recebeNoticiaParaEditar['autor']) ? $recebeNoticiaParaEditar['autor'] : $_SESSION['usuario'] ?>">
                    </div>
                    <?php if (isset($_POST['idNoticia'])) { ?>
                        <button type="submit" name="EditarNoticia" class="btn btn-success">
                            <input type="hidden" name="idDaNoticia" value="<?php echo $recebeNoticiaParaEditar['id'] ?>">
                            <input type="hidden" name="imagemSemAlteracao" value="<?php echo $recebeNoticiaParaEditar['imagem'] ?>">
                            <span></span> Atualizar
                        </button>
                    <?php } else {
                        ?>
                        <button type ="submit" name = "InserirNoticia" class = "btn btn-success">
                            <span></span> Inserir
                        </button>
                    <?php } ?>
                </form>
        </div>
    </div>
</div>