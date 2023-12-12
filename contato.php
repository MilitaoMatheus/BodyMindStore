<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BodyMindStore || Categorias</title>
    <link rel="icon" type="image/png" href="img/netflix.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery livraria -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- JavaScript compilado-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
      .navbar{ margin-bottom: 0;}
    </style>

</head>
<body>
    <?php 
    include 'nav.php';
    include 'cabecalho.html';
    include 'conexao.php';
?>

<div class="container-fluid">

<div class="row">

    <div class="col-sm-4 col-sm-offset-4">

        <h2>Entre em Contato conosco</h2>

        <form method="post" action="pegarcritica.php" name="logon">

            <div class="form-group">
                <label for="nome">Digite seu nome:</label>
                <input name="txtnome" type="text" class="form-control" required id="nome">
            </div>

        <div class="form-group">
                <label for="email">Digite seu E-mail:</label>
                <input name="txtemail" type="email" class="form-control" required id="email">
        </div>

        <div class="form-group">
                <label for="critica">Digite sua critica:</label>
                <textarea name="txtcritica" rows="5" class="form-control" required id="critica"></textarea>
        </div>

        <button type="submit" class="btn btn-lg btn-default">
            <span class="glyphicon glyphicon-ok"> Enviar</span>
        </button>
        </form>

    </div>
</div>
</div>

<?php 
    echo '<br><br>';
    include 'redes.html';
    echo '<br><br>';
    include 'rodape.html';
?>
</body>
</html>