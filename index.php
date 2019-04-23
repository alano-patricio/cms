<?php include 'banco/conectaBanco.php'; ?>
<html>
    <head>
        <title>SISTEMA!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
        
        $validaLogin = 1;

        if (isset($_POST['validaLogin'])) {
            include ('validaLogin.php');
        } elseif (isset($_POST['sair'])) {
            include ('logoff.php');
        } elseif (isset($_SESSION['LOGADO']) == 'verdade') {
            include ('home.php');
        } else {
            include 'login.php';
        }
        ?>
    </body>
</html>
