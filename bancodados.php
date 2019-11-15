<?php
    function conectar(){
        $conn = mysqli_connect("localhost", "root", "root", "donativos") or die("NÃO FOI POSSÍVEL CONECTAR-SE AO BANCO DE DADOS");
        return $conn;
    }

    function pegarCedulas(){
        $query = "SELECT * FROM cedulas";
        $result = mysqli_query(conectar(), $query);
        return $result;
    }
    
    function pegarMoedas(){
        $query = "SELECT * FROM moedas";
        $result = mysqli_query(conectar(), $query);
        return $result;
    }

    function pegarTotal(){
        $query = "SELECT * FROM total";
        $result = mysqli_query(conectar(), $query);
        return $result;
    }

    function totSep($id){
        $query = "SELECT * FROM total WHERE id=$id";
        $result = mysqli_query(conectar(), $query);
        return $result;
    }

    function somar($valores, $cash){
        $total = 0;
        for($e=0;$e<6;$e++){
            $total += $valores[$e] * $cash[$e];
        }
        return $total;
    }

    function resetar1(){
        $query = "TRUNCATE total";
        $result = mysqli_query(conectar(), $query);
        return $result;
    }

    function resetar2(){
        $query = "TRUNCATE cedulas";
        $result = mysqli_query(conectar(), $query);
        return $result;
    }

    function resetar3(){
        $query = "TRUNCATE moedas";
        $result = mysqli_query(conectar(), $query);
        return $result;
    }
?>