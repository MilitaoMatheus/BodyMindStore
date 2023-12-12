<?php
    include 'conexao.php';

    session_start();
    $Vemail = $_POST['txtemail'];
    $Vsenha = $_POST['txtsenha'];

    /*
    echo $Vemail.'<br>';
    echo $Vsenha.'<br>';
    */

    $consulta = $cn->query("select CodUsuario, NomeUsuario, Email, Senha, StatusUsu from tbUsuario where Email = '$Vemail' and Senha = '$Vsenha'");
    if($consulta->rowCount() == 1){
        $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($exibeUsuario['StatusUsu'] == 0) {
            $_SESSION['ID'] = $exibeUsuario['CodUsuario'];
            $_SESSION['StatusUsu'] = 0;
            header('location:loja.php');
        } 
        else {
            $_SESSION['ID'] = $exibeUsuario['CodUsuario'];
            $_SESSION['StatusUsu'] = 1;
            header('location:loja.php');
        } 
    }
        else{
        header('location:erro.php');
        }
?>