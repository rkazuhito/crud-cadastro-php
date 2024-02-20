<?php
session_start();
include_once("conexao.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Listar</title>
</head>
<body>
    <h1>Listar</h1>
    <a href="index.php"><button>listagem</button></a> 
    <a href="cad_usuario.php"><button>cadastrar</button></a>
    <br> <br>
    
    <?php
    if (isset($_SESSION['msg'])){ //se existir a variável global de msg
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    $result_usuarios = "SELECT * FROM usuarios"; //faz uma consulta dos usuarios
    $resultado_usuarios = mysqli_query($conn,$result_usuarios); //conecta no db e salva a consulta numa variável
    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){ //passa em um loop os resultados recebidos da consulta e adiciona a uma variável row_usuario q será exibida na sequencia
        echo "ID: ". $row_usuario['id']. "<br>";
        echo "Nome: ". $row_usuario['nome']. "<br>";
        echo "E-mail: ". $row_usuario['email']. "<br>";
        echo "Senha: ". $row_usuario['senha']. "<br>";
        echo "<a href='proc_aapagar_usuario.php?id=".$row_usuario['id']."'>apagar</a>";
        echo "<a href='edit_usuario.php?id=".$row_usuario['id']."'>editar</a><br><hr>";
        
    }
    ?>

</body>
</html>