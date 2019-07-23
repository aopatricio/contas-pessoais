<?php
include("banco.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
</head>

<?php
                    $varmesselecionado = date("m");

                    if(!isset($_POST['periodo'])) {
                    $varmesselecionado = date("m");
                    }

                    else{
                    $varmesselecionado = $_POST['periodo'];
                    }   

                        if ($varmesselecionado == 1) {
                            $mes = "Janeiro"; }
                        elseif ($varmesselecionado == 2) {
                            $mes = "Fevereiro";
                        }
                        elseif ($varmesselecionado == 3) {
                            $mes = "Março";
                        }
                        elseif ($varmesselecionado == 4) {
                            $mes = "Abril";
                        }elseif ($varmesselecionado == 5) {
                            $mes = "Maio";
                        }elseif ($varmesselecionado == 6) {
                            $mes = "Junho";
                        }elseif ($varmesselecionado == 7) {
                            $mes = "Julho";
                        }elseif ($varmesselecionado == 8) {
                            $mes = "Agosto";
                        }elseif ($varmesselecionado == 9) {
                            $mes = "Setembro";
                        }elseif ($varmesselecionado == 10) {
                            $mes = "Outubro";
                        }elseif ($varmesselecionado == 11) {
                            $mes = "Novembro";
                        }elseif ($varmesselecionado == 12) {
                            $mes = "Dezembro";
                        }
                    ?>

<body style="margin: 0px auto"> 
    <nav> 
        <div class="container" style="margin: 5px 75px;">
            <div style="float: left; margin-left: 20px; margin-bottom: 20px;" >
                <form method="post" id="frmperiodo" action="layout.php?a=lancamento_receitas.php">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12 col-md-12 col-md-12 col-md-12">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label style="margin-left: -20px" class="control-label" for="cmes"> Mês:</label>
                                    <select style="margin-left: -20px ; width: 100px" name="periodo" id="periodo" class="select select-primary select-exemploa form-control" data-toggle="select">
                                        <option selected value=<?php echo $varmesselecionado ?>> <?php echo $mes ?></option>
                                        <option value="1">Janeiro</option>
                                        <option value="2">Fevereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="control-label" for="Cano"> Ano:</label>
                                    <select class="select select-primary select-exemploa form-control"  name="ano" id="ano" data-toggle="select">
                                        <option value="2018">2018</option>
                                        <option selected value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>
 
                    </div>
                </br>
                    <div style="float: left; margin-left: 0px; margin-bottom: 20px; width: 110px;" >
<a href="#" onclick="frmperiodo.submit()"><button title="Clique para incluir um novo lançamento!" style="float: right; margin-left: 100px;  height: 32px; margin-top: 5px; font-size: 14px" type='button' class='btn btn-default btn-sm glyphicon glyphicon-search'> Pesquisar</button>
</a> 
                </nav>
</div>
                <div>
                    <nav style="clear: both; " >

                    <?php

                        if(!isset($_POST['periodo'])) {
                        $varmesselecionado = date("m");
                        $varanoselecionado = 2019;

                        $queryreceita = "Select sum(tb1.valor) FROM (lancamento As tb1 
                        INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                        INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                        INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                        INNER JOIN tb_status As tb5 On tb1.despfixa = tb5.id 
                        WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado and tb1.conta_credito=1";
                    }
                     else {

                            $varmesselecionado = $_POST['periodo'];
                            $varanoselecionado = $_POST['ano'];

                        $queryreceita = "Select sum(tb1.valor) FROM (lancamento As tb1 
                        INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                        INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                        INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                        INNER JOIN tb_status As tb5 On tb1.despfixa = tb5.id 
                        WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado and tb1.conta_credito=1  ORDER BY tb1.data ASC";
                    }

                    $queryreceita = mysqli_query($conexao, $queryreceita);
                    $dados = mysqli_fetch_array($queryreceita);
                    $valor=$dados[0];
                    $valorreceita = abs($valor);
                    $novovalorreceita = 'R$ ' . number_format($valorreceita, 2, ',', '.');
                    
                    ?>

                           <div style="float: left;">     
                            <p style="font-size: 20px; color: black; margin-left: 100px; width: 900px; text-align: center; background-color: gray;"> Receitas do Mês: <?php echo $mes; ?> </p>
                        </div>
                        <div style="float: left;">

                        <p style="font-size: 20px; color: black; margin-left: 10px; width: 300px;text-align: center; background-color: gray;"> Valor: <?php echo $novovalorreceita; ?></p>    
                        </div>  
                         
                    </nav>
                </div>
                <div>
                    <table style="margin-left: 100px; width: 1200px" id="myTable" class="table table-hover" > 

                        <thead>  
                            <tr>
                                <th name="data" width=150px scope="col">Data</th>
                                <th name="historico" width=1000px scope="col">Histórico</th>
                                <th name="contadebito" width=450px scope="col">Conta Débito</th>
                                <th name="contacredito" width=550px scope="col">Conta Crédito</th>
                                <th name="valor" width=300px scope="col">Valor</th>
                                <th name="pg" width=60px scope="col">Pago</th>
                                <th name="despfixa" width=60px scope="col">Fixa</th>
                            </tr>
                        </thead>  



                    <?php

                        if(!isset($_POST['periodo'])) {
                        $varmesselecionado = date("m");
                        $varanoselecionado = 2019;

                        $query = "Select tb1.id, tb1.data, tb1.historico, tb2.name, tb3.name, tb1.valor, tb4.name, tb5.name 
                        FROM (lancamento As tb1 
                        INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                        INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                        INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                        INNER JOIN tb_status As tb5 On tb1.despfixa = tb5.id 
                        WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado and tb1.conta_credito=1 ORDER BY tb1.data ASC";
                    }
                     else {

                            $varmesselecionado = $_POST['periodo'];
                            $varanoselecionado = $_POST['ano'];

                        $query = "Select tb1.id, tb1.data, tb1.historico, tb2.name, tb3.name, tb1.valor, tb4.name, tb5.name 
                        FROM (lancamento As tb1 
                        INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                        INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                        INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                        INNER JOIN tb_status As tb5 On tb1.despfixa = tb5.id 
                        WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado and tb1.conta_credito=1 ORDER BY tb1.data ASC";
                    }



                        $dados = mysqli_query($conexao, $query);

                        while ($row = mysqli_fetch_row($dados)){
                            $id=$row[0];
                            $data=$row[1];
                            $historico=$row[2];
                            $debito=$row[3];
                            $credito=$row[4];
                            $valor=$row[5];
                            $pg=$row[6];
                            $despfixa=$row[7];

                            $novadata = date('d/m/Y', strtotime($data));    
                            $valorpositivo = abs($valor);
                            $novovalor = 'R$ ' . number_format($valorpositivo, 2, ',', '.');

                            echo "<tr>

                            <td>$novadata</td>
                            <td>$historico</td>
                            <td>$debito</td>
                            <td>$credito</td>
                            <td>$novovalor</td>
                            <td>$pg</td>
                            <td>$despfixa</td>
                            ";
                        }  
                        ?> 
                    </div>
                </body>
            </table>
            <script>
                $(document).ready(function(){
                    $('#myTable').dataTable( {
                    });
                </script>
                </html>