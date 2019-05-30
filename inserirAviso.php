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
                    <label>Aviso</label>
                    <textarea class="form-control" name="AddTituloAviso" rows="2"></textarea>
                </div>                
                <div class="form-group">
                    <label>Data cadastro</label>
                    <input type="datetime" readyonly name="AddDataCadastroAviso" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>">
                </div>
                <div class="form-group">
                    <label>Inicio do aviso</label>
                    <input type="datetime" name="AddDataInAviso" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>">
                </div>
                <div class="form-group">
                    <label>Termino do aviso</label>
                    <input type="datetime" name="AddDataOutAviso" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>">
                </div>
                <div class="form-group">
                    <label>Autor</label>
                    <input type="text" readonly name="AddAutorAviso" class="form-control" value="<?php echo $_SESSION['usuario'] ?>">
                </div>
                <input type="hidden" name="InserirAviso">
                <button type="submit" class="btn btn-success" >
                    <span></span> Inserir
                </button>
            </form>
        </div>
    </div>
</div>