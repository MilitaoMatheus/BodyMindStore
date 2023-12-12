<?php
include 'conexao.php';

$nCritica = $_POST ['txtnome'];
$nEmail = $_POST ['txtemail'];
$Critica = $_POST ['txtcritica'];

/*
echo $nome.'<br>';
echo $email.'<br>';
echo $senha.'<br>';
echo $end.'<br>';
echo $cidade.'<br>';
echo $cep.'<br>';
*/

$consulta = $cn->query("select Critica from tbCritica where Critica = '$Critica'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


    $incluir = $cn->query("insert into tbCritica(NomeCritica, EmailCritica, Critica)
    values('$nCritica', '$nEmail', '$Critica')");
    header('location:ok2.php');

?>