<?php
session_start();
include_once("conexao.php");  //inclui a conexão com o db
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE FROM usuarios WHERE id='$id'";
$resultado_usuario = mysqli_query ($conn,$result_usuario);
if (mysqli_affected_rows($con)) {
    $_SESSION['msg']="<p style='color:green;'>Apagado</p>";
    header("Location: index.php");
}
else{
    $_SESSION['msg']="<p style='color:red;'>erro</p>";
    header("Location: index.php");
}