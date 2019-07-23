<?php
    //session_start();
    if(empty($_SESSION['usuarioNome'])){
    header("location:index.php");
}

?>
<?php 
include('functions.php');
?>	
<!DOCTYPE html>

<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrap">
        <div class="container">
            <div class="row">

                <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>

                        <!-- Form Name -->
                        <legend style="padding: 90px 10px 10px 10px; margin-left: 200px; width: 800px; text-align: center;"><h1>Importação de Notas Fiscais</h1></legend>

                        <!-- File Button -->
                        <div style="padding-top: 10px; margin-left: 250px" class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Selecione o arquivo</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large" required>
                            </div>
                        </div>
						
                        <!-- Button -->
                        <div style="padding-top: 10px; margin-left: 250px" class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Importar dados</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="ImportNotasFiscais" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                            </div>
                        </div>
						
                    </fieldset>
                </form>
				
            </div>

</html>
