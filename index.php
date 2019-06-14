<?php
include 'menu.php';
include 'banco/conectaBanco.php';
include 'topo.php';
include 'funcoes.php';



//Dados da area 02
//OFICIAL É ESSE
$sql = "SELECT * FROM noticia WHERE NOW() BETWEEN data_inicial AND data_final;";
//DEBUG
//$sql = "SELECT * FROM noticia";
$statement = $pdo->query($sql);
$recebeNoticia = $statement->fetchAll(PDO::FETCH_OBJ);
$statement->closeCursor();

//Dados da area 03
$sql2 = "SELECT * FROM aviso WHERE NOW() BETWEEN data_inicial AND data_final;";
//DEBUG
//$sql2 = "SELECT * FROM aviso";
$statement2 = $pdo->query($sql2);
$recebeAviso = $statement2->fetchAll(PDO::FETCH_OBJ);
$statement2->closeCursor();
?>

<!-- inicio da area 02 -->
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">

                <?php if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 2) {
                    ?>
                    <div class="row">
                        <div class="col-md-10">
                            <a href="inserirNoticia.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> ADD Noticia</a> 
                            <br><br>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <?php
                    $cont = 1;
                    foreach ($recebeNoticia as $noticiaArray):
                        ?>
                        <div class="col-md-4 ">       
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="noticia.php?idDaNoticia=<?php echo $noticiaArray->id ?>">
                                        <div id="minuaturaNoticia">
                                            <img src="<?php echo $noticiaArray->imagem ?>" class="img-responsive previewNoticia">
                                        </div>
                                    </a>
                                </div>

                                <?php if (@$_SESSION['nivel'] == 1) { ?>
                                    <form action="inserirNoticia.php" method="POST">
                                        <div class="panel-footer text-center"><?php echo $noticiaArray->titulo ?>
                                            <input type="hidden" name="idNoticia" value="<?php echo $noticiaArray->id ?>">
                                            <?php if ($_SESSION['nivel'] == 1) { ?>
                                                <button type="submit" class="btn-danger pull-right glyphicon glyphicon-pencil" name="editarNoticia"></button>
                                            <?php } ?>
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <div class="panel-footer text-center"><?php echo $noticiaArray->titulo ?></div>
                                <?php } ?> 

                            </div>
                        </div>
                        <?php if (($cont % 3) == 0) { ?> 

                        </div>
                        <div class="row">
                            <?php
                        }
                        $cont++;
                    endforeach;
                    ?> 
                </div>

            </div>

            <!--Inicio da area 03-->
            <div class="col-md-4">
                <?php if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="inserirAviso.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> ADD Aviso</a>
                            <br><br>
                        </div>
                    </div>
                    <?php
                }
                foreach ($recebeAviso as $avisoArray):
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <form action="inserirAviso.php" method="POST">
                                    <div class="panel-body">
                                        <?php echo $avisoArray->aviso; ?>
                                        <input type="hidden" name="idAviso" value="<?php echo $avisoArray->id ?>">
                                        <?php if (@$_SESSION['nivel'] == 1) { ?>
                                            <button type="submit" class="btn-danger pull-right glyphicon glyphicon-pencil" name="editarAviso"></button>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>             


        </div>
    </div>
</div>






