<?php ?>
<div class=" container-fluid">
    <div class="row">
        <div class=" col-md-6 col-md-offset-3">
            <form action="action/acao.php" method="POST">
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="AddTituloNoticia" class="form-control">
                </div>
                <div class="form-group">
                    <label>Data noticia entrar no ar</label>
                    <input type="datetime" name="AddDataEntrarNoAr" class="form-control" value="<?php echo date("d/m/Y H:i") ?>">
                </div>
                <div class="form-group">
                    <label>Data noticia sair do ar</label>
                    <input type="datetime" name="AddDataSairDoAr" class="form-control" value="<?php echo date("d/m/Y H:i") ?>">
                </div>
                <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" name="AddImagemNoticia" class="form-control">
                </div>
                <div class="form-group">
                    <label>Noticia</label>
                    <textarea class="form-control" name="AddNoticiaNoticia" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" class="big-checkbox" name="AddAtivoNoticia" value="1"/>
                    <label class="text-center">Ativo</label>
                </div>
                <input type="hidden" name="adicionarNoticiaNoBanco" >
                <button type="submit" class="btn btn-success" >
                    <span></span> Inserir
                </button>


            </form>
        </div>
    </div>
</div>