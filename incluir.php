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
        <title>Inclusão de Registro</title>
        <meta charset="UTF-8">
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
    <body>
        <div id="id_test">
            <!-- Aqui começa o formulario de edicao-->
            <div style="float: left; background: white; width: 660px; height: 410px; margin-left: 150px; padding-top: 0px;">
            <form method="post" id="rendered-form">
                <div class="rendered-form">
                    <div class="">
                        <h1 style=" margin-left: 20px;" id="formulario">Inclusão de Registro</h1>
                    </div>
                    <div style="float: left; margin-left: 20px; width: 155px" class="fb-date form-group field-cmpdata">
                        <label for="cmpdata" class="fb-date-label">Data</label>
                        <input type="date" class="form-control" name="cmpdata" id="cmpdata" value="<?php echo date('Y-m-j'); ?>">
                        
                                                
                    </div>
                        <div style="float: left; margin-left: 20px; width: 200px" class="fb-select form-group field-contadebito">
                            <label for="contadebito" class="fb-select-label">Conta Débito</label>
                            <select class="form-control" name="contadebito" id="contadebito">
                            <option value="1" selected="True" id="slct-pg-0">Selecione</option>;
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
                                <option value="1" selected="True" id="slct-pg-0">Selecione</option>;
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
                                <input type="text" class="form-control" name="txtvalor" id="txtvalor">
                        </div>
                                <div style="float: left; margin-left: 20px; width: 100px"class="fb-select form-group field-slct-pg">
                                    <label for="slct-pg" class="fb-select-label">Pago</label>
                                    <select class="form-control" name="pg" id="slct-pg">
                                    <option value="0" selected="True" id="slct-pg-0">Selecione</option>;    
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
                                        <option value="0" selected="True" id="slct-pg-0">Selecione</option>;
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
                                        <textarea rows="5" cols="75" name="txt_historico" form="rendered-form" ></textarea>

                    </div>


                <div style="clear: left">
                    <div style="margin-left: 20px; width: 400px;" class="fb-button form-group field-bbt-salvar">
                        <button type="submit" name="add" class="btn btn-success" name="bbt-salvar" style="success" id="bbt-salvar">Salvar</button>
                        <button type="button" class="btn btn-warning" name="btb-fechar" style="warning" id="btb-fechar">Fechar</button>
                    </div>
                </div>

        </form>
        </div>
        <?php
{
if(isset($_POST['add'])){
    $alt_data = $_POST['cmpdata'];
    $alt_debito = explode(';',$_POST['contadebito']);
    $alt_credito = explode(';',$_POST['contacredito']);
    $alt_valor = $_POST['txtvalor'];
    $alt_pago = $_POST['pg'];
    $alt_despfixa = $_POST['fixa'];
    $alt_historico= $_POST['txt_historico'];
    $novovalor = str_replace(',', '.', $alt_valor);
    $varvalor = $novovalor * -1;
    
    if ($alt_credito[1] == '1' or $alt_credito[1] == '2') {
    $sqllancamento = "INSERT INTO lancamento (data, historico, conta_debito, conta_credito, valor, pg, despfixa) VALUES ( '$alt_data', '$alt_historico', '$alt_debito[0]', '$alt_credito[0]', '$varvalor', '$alt_pago', '$alt_despfixa')";
    }
    else{
    $sqllancamento = "INSERT INTO lancamento (data, historico, conta_debito, conta_credito, valor, pg, despfixa) VALUES ( '$alt_data', '$alt_historico', '$alt_debito[0]', '$alt_credito[0]', '$novovalor', '$alt_pago', '$alt_despfixa')";
    }
    if ($conexao->query($sqllancamento) === TRUE) {
        echo "<script type=\"text/javascript\">
        alert(\"Novo registro cadastrado com sucesso...\");
        window.location = \"layout.php?a=lancamento.php\"
        </script>";   
} else {
    echo "Error inserting record: " . $conexao->error;
}
}
}
?>
</body>  
</html>  