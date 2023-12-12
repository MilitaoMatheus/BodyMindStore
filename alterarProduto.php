<?php

include 'conexao.php';  // incluindo a conexao
include 'resize-class.php'; // classe para redimensionar imagem

$codProduto = $_GET['cd_altera'];  // variavel recebe o código do livro que acabamos de receber do formulário

// abaixo criando a consulta pelo codigo do livro que recebemos acima
$consulta = $cn->query("SELECT Imagem FROM tbProduto WHERE CodProduto='$codProduto'"); 

//criando uma array 
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


// todas as laterações feitas nos campos se rão salvas nas variaveis abaixo

  // armazenando o valor do txtisbn na variavel $isbn 
$categoria = $_POST['sltcat'];  // armazenando o valor de sltcat na variavel $categoria
$produto = $_POST['txtproduto'];
$produtora = $_POST['sltprodutora'];
$preco = $_POST['txtpreco'];
$info = $_POST['txtdescrição'];
$qtde = $_POST['txtqtde'];
$lanc = $_POST['sltlanc'];


$remover1='.';  // variável que vai receber o ponto
$preco = str_replace($remover1, '', $preco); // substituindo . por vazio
$remover2=','; // variável que vai receber a virgula
$preco = str_replace($remover2, '.', $preco); // substituindo , por .

$recebe_foto1 = $_FILES['txtfoto1'];  // recebendo conteudo do campo file


$destino = "img/";  //pasta aonde será feito upload da imagem


if (!empty($recebe_foto1['name'])) { // se a propriedade name[propriedade que pega o nome da imagem ] não estiver vazia faça

	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1); // pegar extensão
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1]; //gerar nome unico para img, enviar esta variável

	$upload_foto1=1; // se variavel criada for 1 precisará trocar imagem

}

else {  // caso não haja alteração na imagem, pegar o nome da imagem que está no banco

	$img_nome1=$exibe['Imagem'];
	$upload_foto1=0;  // zero pq não fará atualização de fotos

}


try {
	// comando update para realizar as trocas
	$alterar = $cn->query("UPDATE tbProduto SET  
	
	CodCategoria = '$categoria',
	NomeProduto = '$produto',
	CodFabricante = '$produtora',
	Preco = '$preco',
	QtdEstoque = '$qtde',
	DescInfo = '$info',
	Imagem = '$img_nome1',
	Lancamento = '$lanc'	
	
	WHERE CodProduto = '$codProduto' 	
	"); // as alterações serão feitas baseadas pelo codigo que recebemos


	if ($upload_foto1==1) {  // se a foto1 for igual a 1 é pq foi feito alteração será feita


		move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
		$resizeObj = new resize($destino.$img_nome1);
		$resizeObj -> resizeImage(340, 480, 'crop');
		$resizeObj -> saveImage($destino.$img_nome1, 100);

	}

	header('location:adm.php');  // redirecionando para a pagina menu principal (se tudo der certo)

} catch(PDOException $e) {  // se exsitir algum problema, será gerado uma mensagem de erro


	echo $e->getMessage();  

}



?>