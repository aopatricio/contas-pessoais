<?php
include("banco.php");
?>
<?php
if(empty($_SESSION['usuarioNome'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lançamento</title>

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
<body style="margin: 0px auto">

    <?php $varmesselecionado = date("m");


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
    <nav> 
        <div class="container" style="margin: 5px 75px;">
            <div style="float: left; margin-left: 20px; margin-bottom: 20px;" >
                <form method="post" id="frmperiodo" action="layout.php?a=lancamento.php">
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
                    <br/>
                    <a href="#" onclick="frmperiodo.submit()"><button title="Clique para consultar o intervalo solecionado!" style="float: center;color: black;" type='button' class='btn btn-default btn-sm glyphicon glyphicon-search'> PESQUISAR</button></a>
                </div>
            </form>

    <div style="float: right; margin-left: -20px; margin-bottom: 20px;" >
<a href="layout.php?a=incluir.php" onclick="frmintervalo.submit()"><button title="Clique para incluir um novo lançamento!" style="float: right; margin-left: 10px;" type='button' class='btn btn-success btn-sm glyphicon glyphicon-plus'></button>
</a> 
</div>
<form method="post" id="frmintervalo" action="layout.php?a=incluir.php"> </form>

                    <div style=" float: left;">
                        <p style="font-size: 20px; color: black; margin-left: 50px;">Receitas do Período</p>

                        <?php
                        if(!isset($_POST['periodo'])) {
                            $varmesselecionado = date("m");
                            $varanoselecionado = date("Y");

                            $queryvalorreceita = "Select sum(tb1.valor)
                            FROM (lancamento As tb1 
                            INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                            INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                            INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                            WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado and tb3.tipo = 3 ORDER BY tb1.data ASC"; 
                            $queryvalorreceita = mysqli_query($conexao, $queryvalorreceita);

    // Tirando o while
                            $dadosreceita = mysqli_fetch_array($queryvalorreceita);
                            $valorreceita=$dadosreceita[0];
                            $novovalorreceita = 'R$ ' . number_format($valorreceita, 2, ',', '.');
                        }
                        else {

                            $varmesselecionado = $_POST['periodo'];
                            $varanoselecionado = $_POST['ano'];
                            $queryvalorreceita = "Select sum(tb1.valor)
                            FROM (lancamento As tb1 
                            INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                            INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                            INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                            WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado and tb3.tipo = 3 ORDER BY tb1.data ASC"; 

                            $queryvalorreceita = mysqli_query($conexao, $queryvalorreceita);

    // Tirando o while
                            $dadosreceita = mysqli_fetch_array($queryvalorreceita);
                            $valorreceita=$dadosreceita[0];
                            $novovalorreceita = 'R$ ' . number_format($valorreceita, 2, ',', '.');

                        }

                        ?>
                        <p style="font-size: 20px; margin-left: 50px; text-align: left; color: blue;"><?php echo $novovalorreceita; ?></p>

                    </div>

                    <div style=" float: left;">
                        <p style="font-size: 20px; color: black; margin-left: 50px;">Despesas do Período</p>

                        <?php
                        if(!isset($_POST['periodo'])) {
                            $varmesselecionado = date("m");
                            $varanoselecionado = date("Y");

                            $queryvalor = "Select sum(tb1.valor)
                            FROM (lancamento As tb1 
                            INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                            INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                            INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                            WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado and tb3.tipo = 1"; 
                            $queryvalor = mysqli_query($conexao, $queryvalor);

    // Tirando o while
                            $dados = mysqli_fetch_array($queryvalor);
                            $valor=$dados[0];
    //$novovalor = 'R$ ' . number_format($valor, 2, ',', '.');
                            $valorpositivo = abs($valor);
                            $novovalor = 'R$ ' . number_format($valorpositivo, 2, ',', '.');

                        }
                        else {

                            $varmesselecionado = $_POST['periodo'];
                            $varanoselecionado = $_POST['ano'];
                            $queryvalor = "Select sum(tb1.valor)
                            FROM (lancamento As tb1 
                            INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                            INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                            INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                            WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado and tb3.tipo = 1"; 

                            $queryvalor = mysqli_query($conexao, $queryvalor);

    // Tirando o while
                            $dados = mysqli_fetch_array($queryvalor);
                            $valor=$dados[0];
                            $valorpositivo = abs($valor);
                            $novovalor = 'R$ ' . number_format($valorpositivo, 2, ',', '.');


                        }

                        ?>
                        <p style="font-size: 20px; margin-left: 50px; text-align: left; color: red;"><?php echo $novovalor; ?></p>

                    </div>
                    <?php 
                    if(!isset($_POST['periodo'])) {
                     $datasaldo = date("t/m/Y");
                 }
                 else {
                    $datasaldo = date("t") . "/" . $varmesselecionado . "/" . $varanoselecionado;
                }

                ?>

                <div style=" float: left;">
                    <p style="font-size: 20px; color: black; margin-left: 50px;">Saldo em: <?php  echo $datasaldo; ?> </p>
                    <?php
                    if(!isset($_POST['periodo'])) {
                        $varmesselecionado = date("m");
                        $varanoselecionado = date("Y");

                        $queryvalor = "Select sum(tb1.valor)
                        FROM (lancamento As tb1 
                        INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                        INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                        INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                        WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado"; 
                        $queryvalor = mysqli_query($conexao, $queryvalor);

    // Tirando o while
                        $dados = mysqli_fetch_array($queryvalor);
                        $valor=$dados[0];
    //$novovalor = 'R$ ' . number_format($valor, 2, ',', '.');
                        $valorpositivo = abs($valor);
                        $novovalor = 'R$ ' . number_format($valorpositivo, 2, ',', '.');

                    }
                    else {

                        $varmesselecionado = $_POST['periodo'];
                        $varanoselecionado = $_POST['ano'];
                        $queryvalor = "Select sum(tb1.valor)
                        FROM (lancamento As tb1 
                        INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                        INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                        INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                        WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado"; 

                        $queryvalor = mysqli_query($conexao, $queryvalor);

    // Tirando o while
                        $dados = mysqli_fetch_array($queryvalor);
                        $valor=$dados[0];
                        $valorpositivo = abs($valor);
                        $novovalor = 'R$ ' . number_format($valorpositivo, 2, ',', '.');


                    }

                    ?>
                    <?php
                    if ($valor > 0) {
                        $cor = "blue";
                    }
                    else {
                        $cor = "red";
                    }
                    ?>
                    <p style="font-size: 20px; margin-left: 50px; text-align: left; color: <?php echo $cor; ?>;"><?php echo $novovalor; ?></p>

                </div>

                <table style="margin-left: 30px;" id="myTable" class="table table-hover" > 

                    <thead>  
                      <tr>
                          <th name="id" width=10px scope="col">ID</th>
                          <th name="data" width=150px scope="col">Data</th>
                          <th name="historico" width=700px scope="col">Histórico</th>
                          <th name="contadebito" width=550px scope="col">Conta Débito</th>
                          <th name="contacredito" width=650px scope="col">Conta Crédito</th>
                          <th name="valor" width=300px scope="col">Valor</th>
                          <th name="pg" width=60px scope="col">Pago</th>
                          <th name="despfixa" width=60px scope="col">Fixa</th>
                          <th name="acao" width=700px scope="col">Ação</th>

                      </tr>
                  </thead>  

                  <tbody>  
                    <?php
                    if(isset($_POST['periodo'])) {
                        $varmesselecionado = $_POST['periodo'];
                        $varanoselecionado = $_POST['ano'];
        //$varmesselecionado = date("m");
                        $query = "Select tb1.id, tb1.data, tb1.historico, tb2.name, tb3.name, tb1.valor, tb4.name, tb5.name 
                        FROM (lancamento As tb1 
                        INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                        INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                        INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                        INNER JOIN tb_status As tb5 On tb1.despfixa = tb5.id WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado ORDER BY tb1.data ASC";

                        /*$query = "SELECT id, data, historico, conta_debito, conta_credito, valor, pg, despfixa FROM lancamento";*/
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
                            <td>$id</td>
                            <td>$novadata</td>
                            <td>$historico</td>
                            <td>$debito</td>
                            <td>$credito</td>
                            <td>$novovalor</td>
                            <td>$pg</td>
                            <td>$despfixa</td>
                            ";

                            ?> 

                            <td>
                              <div class='btn-group' role='group' aria-label='...'>
                                  <a href="layout.php?a=editar.php&id=<?php echo $id;?>" data-toggle="modal"><button title="Clique para editar esse lançamento!" type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
                                  <a href="#delete<?php echo $id;?>" data-toggle="modal"><button title="Clique para remover esse lançamento!" type='button' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-trash remove' aria-hidden='true'></span></button></a>
                                  <a href="layout.php?a=duplicar.php&id=<?php echo $id;?>" data-toggle="modal"><button title="Clique para duplicar esse lançamento!"type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-copy' aria-hidden='true'></span></button></a>

                              </div>
                          </td>

                          <!--Delete Modal -->
                          <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
                           <div class="modal-dialog">
                               <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Remover</h4>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                  <p>
                                   <div class="alert alert-danger">Deseja remover o registro..:  <strong><?php echo $historico; ?>?</strong></p>
                                   </div>
                                   <div class="modal-footer">
                                    <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle "></span> NO</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <?php
        }
    }
    if(isset($_POST['delete'])){
    // sql to delete a record
        $delete_id = $_POST['delete_id'];
        $sql = "DELETE FROM lancamento WHERE id='$delete_id' ";
        if ($conexao->query($sql) === TRUE) {

            echo "<script type=\"text/javascript\">
            window.location = \"layout.php?a=lancamento.php\"
            </script>";   

        } else {
            echo "Error deleting record: " . $conexao->error;
        }
    }

    ?>

    <?php
    if(!isset($_POST['periodo'])) {
        //$varmesselecionado = $_POST['periodo'];
        $varmesselecionado = date("m");
        $varanoselecionado = date("Y");
        $query = "Select tb1.id, tb1.data, tb1.historico, tb2.name, tb3.name, tb1.valor, tb4.name, tb5.name 
                FROM (lancamento As tb1 
                INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                INNER JOIN tb_status As tb5 On tb1.despfixa = tb5.id WHERE MONTH(tb1.data)=$varmesselecionado and YEAR(tb1.data)=$varanoselecionado ORDER BY tb1.data ASC";

        /*$query = "SELECT id, data, historico, conta_debito, conta_credito, valor, pg, despfixa FROM lancamento";*/
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
            <td>$id</td>
            <td>$novadata</td>
            <td>$historico</td>
            <td>$debito</td>
            <td>$credito</td>
            <td>$novovalor</td>
            <td>$pg</td>
            <td>$despfixa</td>
            ";

            ?> 

            <td>
                <div class='btn-group' role='group' aria-label='...'>
                    <a href="layout.php?a=editar.php&id=<?php echo $id;?>" data-toggle="modal"><button title="Clique para editar esse lançamento!" type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
                    <a href="#delete<?php echo $id;?>" data-toggle="modal"><button title="Clique para remover esse lançamento!" type='button' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-trash remove' aria-hidden='true'></span></button></a>
                    <a href="layout.php?a=duplicar.php&id=<?php echo $id;?>" data-toggle="modal"><button title="Clique para duplicar esse lançamento!"type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-copy' aria-hidden='true'></span></button></a>

                </div>
            </td>

            <!--Delete Modal -->
            <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="post">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Remover</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                <p>
                                    <div class="alert alert-danger">Deseja remover o registro..:  <strong><?php echo $historico; ?>?</strong></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle "></span> NO</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <?php
            }
        }
        if(isset($_POST['delete'])){
    // sql to delete a record
            $delete_id = $_POST['delete_id'];
            $sql = "DELETE FROM lancamento WHERE id='$delete_id' ";
            if ($conexao->query($sql) === TRUE) {

                echo "<script type=\"text/javascript\">
                window.location = \"layout.php?a=lancamento.php\"
                </script>";   

            } else {
                echo "Error deleting record: " . $conexao->error;
            }
        }

        ?>

    </tbody>  
</table>  
</div>
</body>  
<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
</script>

<script type='text/javascript'>
    $(window).load(function(){
        $(function () {
            $("table#myTable").on("click", ".remove", function () {
                $(this).closest('tr').remove();
            });
        });
    });
</script>

</html>  