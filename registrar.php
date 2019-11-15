<?php
    header("Location: valores.php");

    include "bancodados.php";

    $val = Array("r2","r5","r10","r20","r50","r100","c1","c5","c10","c25","c50","c100");
    $cash1 = Array(2,5,10,20,50,100);
    $cash2 = Array(0.01,0.05,0.1,0.25,0.5,1);
    $arCed = Array();
    $arMoe = Array();

    for($c=0;$c<12;$c++){
        if($c < 6){
            $arCed[] = $_POST[$val[$c]];
        } else {
            $arMoe[] = $_POST[$val[$c]];
        }
    }

    $query1 = "INSERT INTO cedulas(r2,r5,r10,r20,r50,r100) VALUES(".$arCed[0];
    for($d=1;$d<6;$d++){
        $query1 .= ", ".$arCed[$d];
    }
    $query1 .= ");";

    $query2 = "INSERT INTO moedas(c1,c5,c10,c25,c50,c100) VALUES(".$arMoe[0];
    for($e=1;$e<6;$e++){
        $query2 .= ", ".$arMoe[$e];
    }
    $query2 .= ");";

    $totalCed = somar($arCed, $cash1);
    $totalMoe = somar($arMoe, $cash2);
    $totalGeral = $totalCed + $totalMoe;

    $query3 = "INSERT INTO total(totalmoe, totalced, totalgeral) VALUES(".number_format($totalMoe, 2).", ".number_format($totalCed, 2).", ".number_format($totalGeral, 2).")";
    mysqli_query(conectar(), $query1) or die("ERRO AO INSERIR CEDULAS");
    mysqli_query(conectar(), $query2) or die("ERRO AO INSERIR MOEDAS");
    mysqli_query(conectar(), $query3) or die("ERRO AO INSERIR TOTAIS GERAIS");

?>