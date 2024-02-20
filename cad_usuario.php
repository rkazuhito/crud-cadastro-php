<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Cadastrar</title>
</head>
<body>
    <h1>Cadastrar</h1>
    <a href="index.php"><button>listagem</button></a> 
    <a href="cad_usuario.php"><button>cadastrar</button></a>
    <br> <br>

    <?php
    if (isset($_SESSION['msg'])){ //se existir a variável global de msg
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form method="POST" action="proc_cad_usuario.php">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="nome completo"> <br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="@mail.com"> <br>
        
        <label>Senha: </label>
        <input type="password" name="senha" placeholder="senha numérica"> <br>

        <input type="submit" value="cadastrar">
    </form>
    
</body>
</html>