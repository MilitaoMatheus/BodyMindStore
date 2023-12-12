<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BMindStore || Sucesso</title>
<link rel="icon" type="image/png" href="img/bmind.png">

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>

.navbar{
	margin-bottom: 0;
}


</style>


</head>

<body>

<?php

	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

	?>


	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-4 col-sm-offset-4 text-center">

				<h2>Critica enviada com sucsso!!!🎉🎉</h2>

				<a href="loja.php" class="btn btn-block btn-info" role="button">Voltar a loja</a>



			</div>
		</div>
	</div>
<br>

<?php 
    echo '<br><br>';
    include 'redes.html';
    echo '<br><br>';
    include 'rodape.html';
?>

</body>
</html>