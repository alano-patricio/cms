<?php
include 'menu.php';
include 'banco/conectaBanco.php';
include 'topo.php';
//Dados da area 01
$sql = "SELECT * FROM noticia";
$statement2 = $pdo->query($sql);
$recebeNoticia = $statement2->fetchAll(PDO::FETCH_OBJ);
$statement2->closeCursor();
session_start();
?>;  
<div class="container col-md-12">
    <div class="row col-md-offset-1">
        <div class="col-md-2 corrigeLateral">
            <form action="index.php" method="POST">
                <input type="hidden" name="adicionarNoticia" >
                <button type="submit" class="btn btn-primary" >
                    <span class="glyphicon glyphicon-plus-sign"></span> ADD
                </button>
            </form>
        </div>

    </div>
</div>
<!-- inicio da area 02 -->

<form name="area02" action="index.php" method="POST">
    <div class="container col-md-12 espacoEntreDivs">
        <div class="row col-md-offset-1">

            <?php
            $cont = 0;
            foreach ($recebeNoticia as $noticiaArray):
                if (($cont % 3) == 0) {
                    ?> 
                    <div class="row col-md-offset-1">
                    </div>

                    <?php
                }
                $cont++
                ?>
                <div class="col-md-2 ">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="noticia1" class="col-md-12">
                                <img src="<?php echo $noticiaArray->imagem ?>" class="img-responsive previewNoticia" alt="Imagem Responsiva">
                            </div>
                        </div>
                        <div class="panel-footer text-center"><?php echo $noticiaArray->titulo ?>
                            <?php if ($_SESSION['nivel'] == 1) { ?>
                                <button type="submit" class="btn-sm btn-danger pull-right" name="adicionarNoticia">
                                    <span class="glyphicon glyphicon glyphicon-pencil"></span>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>       