<?php
include 'menu.php';
include 'banco/conectaBanco.php';
include 'topo.php';
?>

<div class=" container-fluid">
    <div class="row">
        <div class=" col-md-6 col-md-offset-3">
            <form action="action/insert.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="AddTituloNoticia" class="form-control">
                </div>
                <div class="form-group">
                    <label>Data de cadastro</label>
                    <input type="datetime" name="AddDataCadastrada" readonly class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>">
                </div>
                <div class="form-group">
                    <label>Inicio da Noticia</label>
                    <input type="datetime" name="AddDataInNoticia" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>">
                </div>
                <div class="form-group">
                    <label>Termino da Noticia</label>
                    <input type="datetime" name="AddDataOutNoticia" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>">
                </div>
                <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" required class="btn btn-primary" name="AddImagemNoticia">
                </div>
                <div class="form-group">
                    <label>Noticia</label>
                    <textarea class="form-control" name="AddNoticiaNoticia" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <label>Autor</label>
                    <input type="text" readonly name="AddAutorNoticia" class="form-control" value="<?php echo $_SESSION['usuario'] ?>">
                </div>
                <input type="hidden" name="InserirNoticia">
                <button type="submit" class="btn btn-success" >
                    <span></span> Inserir
                </button>
            </form>
        </div>
    </div>
</div>