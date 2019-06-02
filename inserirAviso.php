<?php
include 'menu.php';
include 'banco/conectaBanco.php';
include 'topo.php';
include 'funcoes.php';

if (isset($_POST['idAviso'])) {
    $buscarAvisoParaEditar = $pdo->prepare("SELECT * FROM aviso where id = :id");
    $buscarAvisoParaEditar->bindValue(':id', $_POST['idAviso'], PDO::PARAM_INT);
    $buscarAvisoParaEditar->execute();
    $recebeAvisoParaEditar = $buscarAvisoParaEditar->fetch();
}
?>

<div class=" container-fluid">
    <div class="row">
        <div class=" col-md-6 col-md-offset-3">
            <?php if (isset($_POST['idAviso'])) { ?>
                <form action="action/update.php" method="POST" enctype="multipart/form-data">
                <?php } else { ?>
                    <form action="action/insert.php" method="POST" enctype="multipart/form-data">
                    <?php } ?>
                    <div class="form-group">
                        <label>Aviso</label>
                        <textarea class="form-control" name="AddTituloAviso" rows="2"><?php echo isset($recebeAvisoParaEditar['aviso']) ? $recebeAvisoParaEditar['aviso'] : "" ?></textarea>
                    </div>                
                    <div class="form-group">
                        <label>Data cadastro</label>
                        <input type="datetime" readonly name="AddDataCadastroAviso" class="form-control" value="<?php echo date("d/m/Y H:i:s") ?>">
                    </div>
                    <div class="form-group">
                        <label>Inicio do aviso</label>
                        <input type="datetime" name="AddDataInAviso" class="form-control" value="<?php echo isset($recebeAvisoParaEditar['data_inicial']) ? dataEmPhp($recebeAvisoParaEditar['data_inicial']) : date("d/m/Y H:i:s") ?>">
                    </div>
                    <div class="form-group">
                        <label>Termino do aviso</label>
                        <input type="datetime" name="AddDataOutAviso" class="form-control" value="<?php echo isset($recebeAvisoParaEditar['data_final']) ? dataEmPhp($recebeAvisoParaEditar['data_final']) : date("d/m/Y H:i:s") ?>">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <input type="text" readonly name="AddAutorAviso" class="form-control" value="<?php echo isset($recebeAvisoParaEditar['autor']) ? $recebeAvisoParaEditar['autor'] : $_SESSION['usuario'] ?>">
                    </div>
                    <?php if (isset($_POST['idAviso'])) { ?>
                        <input type="hidden" name="idDoAviso" value="<?php echo $recebeAvisoParaEditar['id'] ?>">
                        <button type="submit" name="editarAviso" class="btn btn-success" >
                            <span></span> Alterar
                        </button>
                    <?php } else { ?>
                        <button type="submit" name="InserirAviso" class="btn btn-success" >
                            <span></span> Inserir
                        </button>
                    <?php } ?>
                </form>
        </div>
    </div>
</div>