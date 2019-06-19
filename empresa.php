<?php
include 'menu.php';
include 'banco/conectaBanco.php';
include 'topo.php';
if ($_SESSION['nivel'] == 1) {
    include 'funcoes.php';

    $sql = "SELECT * FROM cadastro_cliente";
    $statement = $pdo->query($sql);
    $recebeDadosEmpresa = $statement->fetch();
    $statement->closeCursor();
    ?>

    <form action="action/update.php" method="POST" enctype="multipart/form-data">
        <div class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <label class="text-center" for="nomeEmpresa">Nome empresa</label>
                        <input type="text" class="form-control" name="nomeEmpresa" id="nomeEmpresa" value="<?php echo $recebeDadosEmpresa['nome'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="telefoneEmpresa" value="<?php echo $recebeDadosEmpresa['telefone'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <label>Email</label>
                        <input type="text" class="form-control" name="emailEmpresa" value="<?php echo $recebeDadosEmpresa['email'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <label>Logo</label>
                        <input type="file" class="btn btn-primary" name="EditaImagemEmpresa">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <br>
                        <input type="submit" name="alteraEmpresa" class="btn btn-success form-control" value="Alterar">
                    </div>
                </div>
            </div>
        </div>
    </form>  
    <?php
} else {
    header('location: logoff.php');
}
?>