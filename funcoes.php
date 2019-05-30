<?php

function dateEmMysql($dateSql) {
    $ano = substr($dateSql, 6, -9);
    $mes = substr($dateSql, 3, -14);
    $dia = substr($dateSql, 0, -17);
    $hora = substr($dateSql, 11, -6);
    $minuto = substr($dateSql, 14, -3);
    $segundo = substr($dateSql, 17);
    return $ano . "-" . $mes . "-" . $dia . " " . $hora . ":" . $minuto . ":" . $segundo;
}

function dataEmPhp($dateSql) {
    $ano = substr($dateSql, 0, -15);
    $mes = substr($dateSql, 5, -12);
    $dia = substr($dateSql, 8, -9);
    $hora = substr($dateSql, 11, -6);
    $minuto = substr($dateSql, 14, -3);
    $segundo = substr($dateSql, 17);
    return $dia . "/" . $mes . "/" . $ano . " " . $hora . ":" . $minuto . ":" . $segundo;
}

?>