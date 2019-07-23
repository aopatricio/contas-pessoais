<?php
    include("banco.php");
?>
<?php
  if(empty($_SESSION['usuarioNome'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
      <title>Alteração de Lançamento</title>
        <meta charset="UTF-8" name="language" content="pt_BR">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
            $id_pg = $_GET['id'];
            $query = "Select tb1.id, tb1.data, tb1.historico, tb2.name, tb3.name, tb1.valor, tb4.name, tb5.name, tb2.id, tb3.id, tb4.id, tb5.id, tb3.tipo FROM (lancamento As tb1 
                     INNER JOIN conta As tb2 On tb1.conta_debito = tb2.id) 
                     INNER JOIN conta As tb3 On tb1.conta_credito = tb3.id
                     INNER JOIN tb_status As tb4 On tb1.pg = tb4.id
                     INNER JOIN tb_status As tb5 On tb1.despfixa = tb5.id WHERE tb1.id=$id_pg";

$query = mysqli_query($conexao, $query);

// Tirando o while
$dados = mysqli_fetch_array($query);

  $id=$dados[0];
  $data=$dados[1];
  $historico=$dados[2];
  $debito=$dados[3];
  $credito=$dados[4];
  $valor=$dados[5];
  $pg=$dados[6];
  $despfixa=$dados[7];
  $idcontadebito=$dados[8];
  $idcontacredito=$dados[9];
  $idpg=$dados[10];
  $iddespfixa=$dados[11];
  $idcreditotipo=$dados[12];
  $valorpositivo = abs($valor);
  $novovalor = 'R$ ' . number_format($valorpositivo, 2, ',', '.');
?>
    <body>



<div id="id_test">
            <!-- Aqui começa o formulario de edicao-->
            <div style="float: left; background: white; width: 660px; height: 510px; margin-left: 150px; padding-top: 0px;">
            <form method="post" id="rendered-form">
                <div class="rendered-form">
                    <div class="">
                        <h1 style=" margin-left: 20px;" id="formulario">Alteração do Lançamento <?php echo $id; ?></h1>
                    </div>
                    <div style="float: left; margin-left: 20px; width: 155px" class="fb-date form-group field-cmpdata">
                        <label for="cmpdata" class="fb-date-label">Data</label>
                        <input type="date" class="form-control date" name="cmpdata" id="cmpdata" value="<?php echo $data; ?>">
                        
                                                
                    </div>
                        <div style="float: left; margin-left: 20px; width: 200px" class="fb-select form-group field-contadebito">
                            <label for="contadebito" class="fb-select-label">Conta Débito</label>
                            <select class="form-control" name="contadebito" id="contadebito">
                            <option value="<?php echo $idcontadebito ;?>"><?php echo $debito; ?></option>
                       <?php

                            $queryconta = "Select id, name, tipo FROM conta ORDER BY name ASC";
                            $dadosconta = mysqli_query($conexao, $queryconta);

                          while($rowconta = $dadosconta->fetch_assoc()){
                             echo "<option value='".$rowconta['id']. ";" .$rowconta['tipo']."'>".$rowconta['name']."</option>";
                            
                                  }
                        ?>
                        
                            </select>
                        </div>
                        <div style="float: left; margin-left: 20px; width: 200px" class="fb-select form-group field-conta_credito">
                            <label for="conta_credito" class="fb-select-label">Conta Crédito</label>
                            <select class="form-control" name="contacredito" id="contacredito">
                            <option value="<?php echo $idcontacredito . ";" . $idcreditotipo;  ?>"><?php echo $credito; ?></option>

                         <?php
                            $queryconta = "Select id, name, tipo FROM conta ORDER BY name ASC";
                            $dadosconta = mysqli_query($conexao, $queryconta);

                             while($rowconta = $dadosconta->fetch_assoc()){
                            echo "<option value='".$rowconta['id']. ";" .$rowconta['tipo']."'>".$rowconta['name']."</option>";
                                  }
                        ?> 
                            </select>
                        </div>
                        <div style="float: left; margin-left: 20px; width: 200px" class="fb-text form-group field-txtvalor">
                                <label for="txtvalor" class="fb-text-label">Valor</label>
                                <input type="text" class="form-control" name="txtvalor" id="txtvalor" value="<?php echo $novovalor; ?>">
                        </div>
                                <div style="float: left; margin-left: 20px; width: 100px"class="fb-select form-group field-slct-pg">
                                    <label for="slct-pg" class="fb-select-label">Pago</label>
                                    <select class="form-control" name="pg" id="slct-pg">
                                    <option value="<?php echo $idpg; ?>"><?php echo $pg; ?></option>  
                         <?php
                            $querystatus = "Select id, name FROM tb_status";
                            $dadosstatus = mysqli_query($conexao, $querystatus);

                             while($rowstatus = $dadosstatus->fetch_assoc()){
                            echo "<option value='".$rowstatus['id']."'>".$rowstatus['name']."</option>";
                                  }

                        ?> 
                                    </select>
                                </div>

                                <div style="float: left; margin-left: 20px; width: 100px" class="fb-select form-group field-slct-fixa">
                                        <label for="slct-fixa" class="fb-select-label">Fixa</label>
                                        <select class="form-control" name="fixa" id="fixa">
                                        <option value="<?php echo $iddespfixa; ?>"><?php echo $despfixa; ?></option>
                         <?php
                            $querystatus = "Select id, name FROM tb_status";
                            $dadosstatus = mysqli_query($conexao, $querystatus);

                             while($rowstatus = $dadosstatus->fetch_assoc()){
                            echo "<option value='".$rowstatus['id']."'>".$rowstatus['name']."</option>";
                                  }
                        ?> 
                          </select>
                          </div>

                          <div style="float: left; margin-left: 20px; width: 590px; height: 130px;" class="fb-text form-group field-txthistorico">
                          <label for="txthistorico" class="fb-text-label">Historico</label>
                          <textarea rows="5" cols="75" name="txt_historico" form="rendered-form"><?php echo $historico; ?></textarea>

                    </div>

                <div style="clear: left">
                    <div style="margin-left: 20px; width: 400px;" class="fb-button form-group field-bbt-salvar">
                        <button type="submit" name="change" class="btn btn-success" name="bbt-salvar" style="success" id="bbt-salvar">Salvar</button>
                        <button type="button" class="btn btn-warning" name="btb-fechar" style="warning" id="btb-fechar">Fechar</button>
                    </div>
                </div>

        </form>
        </div>


<?php

if(isset($_POST['change'])){
    //$alt_id = $_POST[$dados['id']];
    $alt_data = $_POST['cmpdata'];
    $alt_debito = explode(';',$_POST['contadebito']);
    $alt_credito = explode(';',$_POST['contacredito']);
    $alt_teste = $_POST['contacredito'];
    $alt_valor = $_POST['txtvalor'];
    $alt_pago = $_POST['pg'];
    $alt_despfixa = $_POST['fixa'];
    $alt_historico= $_POST['txt_historico'];
    
    $removecifrao = str_replace("R$ ", "", $alt_valor);
    $removeponto = str_replace(".", "", $removecifrao);
    $alteravirgula = str_replace(',', '.', $removeponto);
    $varvalor = $alteravirgula * -1;


    if ($alt_credito[1] == '3') {
    $sqllancamento = "update lancamento set data='$alt_data', historico='$alt_historico', conta_debito='$alt_debito[0]', conta_credito='$alt_credito[0]', valor='$alteravirgula', pg='$alt_pago', despfixa='$alt_despfixa' WHERE id='$id'";
    
    }
    else{
    $sqllancamento = "update lancamento set data='$alt_data', historico='$alt_historico', conta_debito='$alt_debito[0]', conta_credito='$alt_credito[0]', valor='$varvalor', pg='$alt_pago', despfixa='$alt_despfixa' WHERE id='$id'";
    
    }

    if ($conexao->query($sqllancamento) === TRUE) {
       echo "<script type=\"text/javascript\">
             alert(\"Registro alterado com sucesso...\");
             window.location = \"layout.php?a=lancamento.php\"
             </script>";   


} else {
    echo "Error deleting record: " . $conexao->error;
}
}
?>

</body>
</html>