<?php
session_start(); //sessao deve ser o primeiro item da pg. vai servir para indicar levar a variável q vai indicar se o cadastro foi realizado com sucesso


include_once("conexao.php"); //conexao db
$id=filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$senha=filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE usuarios SET nome = '$nome', email = '$email', modified = NOW(), senha = '$senha' WHERE id='$id'";
$resultado_usuario = mysqli_query($conn,$result_usuario);

if(mysqli_affected_rows(($conn))){ //verifica se salvou se a conexao retorna id, ele inseriu com sucesso
    $_SESSION['msg']="<p style='color:green;'>Editado</p>";
    header("Location: index.php");
}else{
    $_SESSION['msg']="<p style='color:red;'>Não foi possível editar</p>";
    header("Location: editar.php?id=$id");
}