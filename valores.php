<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <?php
            include "bancodados.php";
        ?>
        <style type="text/css">
            h1 {
                text-align: center;
                font-weight: bold;
            }

            table {
                width: 100%;
                margin-left: 50%;
                transform: translate(-50%);
            }

            table, th {
                border: 2px solid black;
                border-spacing: 0.9px
            }

            th {
                background-color: #BDBDBD;
                text-align: center;
                font-weight: bold;
                color: black;
            }

            .table>thead>tr>th {
                border-bottom: 2px solid black;
            }

            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                border-top: 1px solid black;
            }

            td {
                border: 1px solid black;
                text-align: center;
                padding: 2px 15px;
                background-color: white;
            }
        </style>
        <title>Valores Da Tabela</title>
    </head>
    <body class="container">
        <h1>Valores Totais</h1>
        <h2>CEDULAS</h2>
        <table>
            <thead>
                <tr>
                    <th>R$ 2,00</th>
                    <th>R$ 5,00</th>
                    <th>R$ 10,00</th>
                    <th>R$ 20,00</th>
                    <th>R$ 50,00</th>
                    <th>R$ 100,00</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = pegarCedulas();

                     while($row = mysqli_fetch_row($result)){
                        echo "<tr>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo "<td>".$row[3]."</td>";
                        echo "<td>".$row[4]."</td>";
                        echo "<td>".$row[5]."</td>";
                        echo "<td>".$row[6]."</td>";
                        echo "<td> R$ ".number_format(mysqli_fetch_row($res = totSep($row[0]))[2], 2, ",", ".")."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <br><br>
        <h2>MOEDAS</h2>
        <table>
            <thead>
                <tr>
                    <th>R$ 0,01</th>
                    <th>R$ 0,05</th>
                    <th>R$ 0,10</th>
                    <th>R$ 0,25</th>
                    <th>R$ 0,50</th>
                    <th>R$ 1,00</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = pegarMoedas();
                    while($row = mysqli_fetch_row($result)){
                        echo "<tr>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo "<td>".$row[3]."</td>";
                        echo "<td>".$row[4]."</td>";
                        echo "<td>".$row[5]."</td>";
                        echo "<td>".$row[6]."</td>";
                        echo "<td>R$ ".number_format(mysqli_fetch_row($res = totSep($row[0]))[1], 2, ",", ".")."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <br><br>
        <h2>TOTAL GERAL</h2>
        <table>
            <thead>
                <tr>
                    <th>Total Cedulas</th>
                    <th>Total Moedas</th>
                    <th>Total Geral</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = pegarTotal();

                    $arc = 0;
                    $arm = 0;
                    while($row = mysqli_fetch_row($result)){
                        $arm += $row[1];
                        $arc += $row[2];
                    }
                    echo "<tr>";
                    echo "<td>R$ ".number_format($arc, 2, ",", ".")."</td>";
                    echo "<td>R$ ".number_format($arm, 2, ",", ".")."</td>";
                    echo "<td>R$ ".number_format(($arc+$arm), 2, ",", ".")."</td>";
                    echo "</tr>";
                    ?>
            </tbody>
        </table><br><br>
        <button id="bt" class="btn btn-danger">RESETAR BANCO DE DADOS</button>
        <br><br>
        <script type="text/javascript">
            var bt = document.querySelector("#bt");

            bt.addEventListener("click", function(){
                r = confirm("RESETAR MySQL DB?");
                if(r == true){
                    <?php resetar1(); resetar2(); resetar3(); ?>
                    location.reload();
                } else {
                    //nothing
                }
            });
        </script>
    </body>
</html>