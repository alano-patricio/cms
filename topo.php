<?php
//Dados flutuantes da empresa
$sql = "SELECT * FROM cadastro_cliente";
$statement = $pdo->query($sql);
$recebeDadosEmpresa = $statement->fetch();
$statement->closeCursor();
?>

<!-- inicio area 01 --> 
<form name="area01" action="login.php" method="POST">
    <div class="container col-md-12">
        <div class="row col-md-offset-1 text-center">
            <div class="col-sm-3 ">
                <img src="img/logo.png" class="img-responsive" alt="Imagem Responsiva"> 
            </div>
            <div class="col-md-2 centralizarTextoLogo ">
                <?php echo $recebeDadosEmpresa['nome']; ?>
            </div>
            <div class="col-md-2 centralizarTextoLogo ">
                <?php echo $recebeDadosEmpresa['telefone']; ?>
            </div>
            <div class="col-md-2 centralizarTextoLogo ">
<?php echo $recebeDadosEmpresa['email']; ?>
            </div>
            <div>
                <input type="submit" name="Entrar" value="Login" />
            </div>

        </div>    
    </div>
</form>
<!-- fim area 01 -->
