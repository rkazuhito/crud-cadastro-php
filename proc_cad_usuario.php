<?php
session_start(); //sessao deve ser o primeiro item da pg. vai servir para indicar levar a variável q vai indicar se o cadastro foi realizado com sucesso


include_once("conexao.php");
$nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$senha=filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO usuarios (nome, email, created, senha) VALUES ('$nome', '$email', NOW(), '$senha')";
$resultado_usuario = mysqli_query($conn,$result_usuario);

if(mysqli_insert_id(($conn))){ //verifica se salvou se a conexao retorna id, ele inseriu com sucesso
    $_SESSION['msg']="<p style='color:green;'>Cadastrado</p>";
    header("Location: index.php");
}else{
    $_SESSION['msg']="<p style='color:red;'>Não foi possível cadastrar</p>";
    header("Location: cad_usuario.php");
}