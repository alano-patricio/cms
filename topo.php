<?php
//Dados flutuantes da empresa
if ($dsn) {
    $sql = "SELECT * FROM cadastro_cliente";
    $statement = $pdo->query($sql);
    $recebeDadosEmpresa = $statement->fetch();
    $statement->closeCursor();
    session_start();
    ?>

    <!-- inicio area 01 --> 
    <div class="section">
        <div class="container-fluid">
            <div class="row">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.php">
                                <img alt="Brand" id="logo" src="img/logo.png">
                            </a>
                        </div>
                        <div class="col-md-2" id="centralizarTextoLogo">
                            <span> <?php echo $recebeDadosEmpresa['nome']; ?></span>
                        </div>
                        <div class="col-md-2" id="centralizarTextoLogo">
                            <span><?php echo $recebeDadosEmpresa['telefone']; ?></span>
                        </div>
                        <div class="col-md-2" id="centralizarTextoLogo">
                            <span><?php echo $recebeDadosEmpresa['email']; ?></span>
                        </div>
                        <div class="pull-right" id="centralizarBotaoLogo" >
                            <?php if (@$_SESSION['nivel'] == 1) { ?> 
                                <a class="dropdown-toggle fa fa-gear" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu" id="centralizarToolsLogo">
                                    <ul><a href="empresa.php">Empresa</a></ul>
                                    <ul><a href="usuarios.php">Usuários</a></ul>
                                </div> <?php } ?>
                            <?php if (isset($_SESSION['nivel'])) { ?>
                                <a href="logoff.php" class="btn btn-danger">Sair</a>
                            <?php } else { ?>
                                <a href="login.php" class="btn btn-success">Entrar</a> 
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>           
        </div>            
    </div>    
    <?php
} else {
    header('location: logoff.php');
}
?>

<!-- fim area 01 -->
