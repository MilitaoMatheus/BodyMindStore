<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BodyMindStore</title>
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
     session_start();
     include 'conexao.php'; 
     include 'nav.php';
     include 'cabecalho.html';
     
    $consulta = $cn->query('select CodProduto, NomeProduto, Preco, Imagem, QtdEstoque from tbProduto');
    ?>

    <div class="container-fluid">
      <div class="row">
        <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
      <!-- Imagens meramente ilustrativas -->
        <div class="col-sm-3">
          <img src="img/<?php echo $exibe ['Imagem'];?>" class="img-responsive" style="width:100%">
          <div><h4><b><?php echo mb_strimwidth($exibe ['NomeProduto'], 0, 30,'...');?></b></h4></div>
          <div><h5>R$:<?php  echo number_format($exibe ['Preco'], 2, ',', '.');?></h5></div>

          <div class="text-center">
          <a href="detalhes.php?cd=<?php echo $exibe['CodProduto']; ?>">
            <button class="btnbtn-lg btn-block btn-info">
              <span class="glyphicon glyphicon-info-sign"> Detalhes </span>
            </button>
          </a>
          </div>

          <div class="text-center" style="margin-top:5px; margin-bottom:5px;">
            <?php
            if ($exibe['QtdEstoque'] > 0){ ?>
            <button class="btnbtn-lg btn-block btn-danger">
              <span class="glyphicon glyphicon-usd"> Comprar </span>
            </button>
            <?php } else{ ?>
              <button class="btnbtn-lg btn-block btn-danger" disabled>
              <span class="glyphicon glyphicon-remove"> Indisponivel </span>
            </button>   
            <?php } ?>
          </div>

        </div>
        <?php } ?>
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