<?php
//Dados flutuantes da empresa
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


<!-- fim area 01 -->
