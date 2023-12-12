<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BMindStore || Alteração de produto</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="jquery.mask.js"></script>

<script>


/* mscara para o preço */	
$(document).ready(function(){

$('#preco').mask('000.000.000.000.000,00', {reverse: true});	

});

</script>

<style>

.navbar{
	margin-bottom: 0;
}


</style>




</head>

<body>

<?php


	session_start();	

    if(empty($_SESSION['StatusUsu']) || $_SESSION['StatusUsu'] != 1){
        header('location:loja.php');  // redireciona para página index.php 
    }

	// rescuperando os ids que foram enviados pela pag lista.php
	$cd = $_GET['id'];
	$cd2 = $_GET['id2'];
	$cd3 = $_GET['id3'];


	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';


	$consulta = $cn->query("SELECT * FROM tbProduto WHERE CodProduto='$cd'");	
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

	$consultaCat = $cn->query("SELECT CodCategoria, DescCategoria FROM tbCategoria where CodCategoria='$cd2' union select CodCategoria, DescCategoria FROM tbCategoria where CodCategoria !='$cd2'");

	$consultaProdutora = $cn->query("SELECT CodFabricante, NomeFabricante FROM tbFabricante where CodFabricante='$cd3' union select CodFabricante, CodFabricante FROM tbFabricante where CodFabricante !='$cd3'");

	?>


	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-4 col-sm-offset-4">

				<h2>Alteração de produto</h2>

				<form method="post" action="alterarProduto.php?cd_altera=<?php echo $cd; ?>" name="incluiProd" enctype="multipart/form-data">

					<div class="form-group">					

						<label for="sltcat">Categoria</label>

						<select class="form-control" name="sltcat">
							<?php					
								while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibecat['CodCategoria'];?>"><?php echo $exibecat['DescCategoria'];?></option>;
							<?php }	?>	
						</select>
					</div>

					<div class="form-group">

						<label for="txtproduto">Nome do Produto</label>
						<input type="text" name="txtproduto" value="<?php echo $exibe['NomeProduto']; ?>"  class="form-control" required id="txtproduto">
					</div>

					<div class="form-group">					

						<label for="sltprodutora">Fabricante</label>

						<select class="form-control" name="sltprodutora">
							<?php					
								while($exibeProdutora = $consultaProdutora->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibeProdutora['CodFabricante'];?>"><?php echo $exibeProdutora['NomeFabricante'];?></option>;
							<?php }	?>	
						</select>
					</div>

					<div class="form-group">

					<label for="txtpreco">Preço</label>

					<input type="text" class="form-control" required name="txtpreco" value="<?php echo $exibe['Preco']; ?>" id="preco">

					</div>

					<div class="form-group">

					<label for="txtqtde">Quantidade em Estoque</label>

					<input type="number" class="form-control" name="txtqtde" value="<?php echo $exibe['QtdEstoque']; ?>" required id="txtqtde">

					</div>

					<div class="form-group">

					<label for="txtdescrição"> Descrição </label>

						<textarea rows="5" class="form-control" name="txtdescrição"><?php echo $exibe['DescInfo']; ?></textarea>


					</div>

					<div class="form-group">

					<label for="txtfoto1">Foto Produto</label>

					<input type="file" accept="image/*" class="form-control" name="txtfoto1" id="foto1">

					</div>

					<div class="form-group">

					<img src="img/<?php echo $exibe['Imagem']; ?>" width="100px" >

					</div>

					<div class="form-group">

					<label for="sltlanc">Lançamento?</label>

					<select class="form-control" name="sltlanc">					  				
					<!-- se o sg_lancamento == S este valor estará selecionado senão vazio -->
					<option value="S" <?=($exibe['Lancamento'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['Lancamento'] == 'N')?'selected':''?>>Não</option>	  
					</select>


					</div>

					<button type="submit" class="btn btn-lg btn-default">

					<span class="glyphicon glyphicon-pencil"> Alterar </span>

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