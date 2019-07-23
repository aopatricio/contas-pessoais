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
    <title>Conta de Lançamento</title>

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
    <nav> 
        <div class="container" style="margin: 5px 75px;">
            <div style="float: left; margin-left: 20px; margin-bottom: 20px;" >

    <div style="float: right; margin-left: -120px; margin-bottom: 20px;" >
<a href="layout.php?a=incluirconta.php" onclick="frmintervalo.submit()"><button title="Clique para incluir um novo lançamento!" style="float: right; margin-left: 10px;" type='button' class='btn btn-success btn-sm glyphicon glyphicon-plus'></button>
</a> 
</div>
<form method="post" id="frmintervalo" action="layout.php?a=incluir.php"> </form>

                <table style="margin-left: 130px;" id="myTable" class="table table-hover" > 

                    <thead>  
                      <tr>
                          <th name="id" width=10px scope="col">ID</th>
                          <th name="conta" width=180px scope="col">Conta</th>
                          <th name="tipo_conta" width=100px scope="col">Tipo Conta</th>
                          <th name="acao" width=100px scope="col">Ação</th>

                      </tr>
                  </thead>  

                  <tbody>  
                    <?php
                    if(!isset($_POST['periodo'])) {
                        $varmesselecionado = $_POST['periodo'];
                        $varanoselecionado = $_POST['ano'];
        //$varmesselecionado = date("m");
                        $query = "Select tb1.id, tb1.name, tb1.tipo, tb2.descricao
                                FROM (conta As tb1 
                                INNER JOIN tipo_conta As tb2 On tb1.tipo = tb2.codigo);";

                        /*$query = "SELECT id, data, historico, conta_debito, conta_credito, valor, pg, despfixa FROM lancamento";*/
                        $dados = mysqli_query($conexao, $query);

                        while ($row = mysqli_fetch_row($dados)){
                            $id=$row[0];
                            $conta=$row[1];
                            $descricao=$row[3];

                            echo "<tr>
                            <td>$id</td>
                            <td>$conta</td>
                            <td>$descricao</td>
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
                                   <div class="alert alert-danger">Deseja remover a conta..:  <strong><?php echo $conta; ?>?</strong></p>
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
        $sql = "DELETE FROM conta WHERE id='$delete_id' ";
        if ($conexao->query($sql) === TRUE) {

            echo "<script type=\"text/javascript\">
            window.location = \"layout.php?a=contas.php\"
            </script>";   

        } else {
            echo "Error deleting record: " . $conexao->error;
        }
    }

    ?>

    <?php
    if(isset($_POST['periodo'])) {
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
                                    <div class="alert alert-danger">Deseja remover a conta..:  <strong><?php echo $conta; ?>?</strong></p>
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
            $sql = "DELETE FROM conta WHERE id='$delete_id' ";
            if ($conexao->query($sql) === TRUE) {

                echo "<script type=\"text/javascript\">
                window.location = \"layout.php?a=contas.php\"
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