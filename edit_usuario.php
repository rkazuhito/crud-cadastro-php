<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT); //recebe o id da edição e atribui a uma variável
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'"; //consulta na tabela qual usuario sera editado
$resultado_usuario = mysqli_query($conn,$result_usuario);//resultado do db
$row_usuario = mysqli_fetch_assoc($resultado_usuario);//le e atribui a variavel row
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Editar</title>
</head>
<body>
    <h1>Editar</h1>
    <a href="index.php"><button>listagem</button></a> 
    <a href="cad_usuario.php"><button>cadastrar</button></a>
    <br> <br>

    <?php
    if (isset($_SESSION['msg'])){ //se existir a variável global de msg
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form method="POST" action="proc_edit_usuario.php">
        <input type="hidden" name="id" value="<?=$row_usuario['id']; ?>">

        <label>Nome: </label>
        <input type="text" name="nome" placeholder="nome completo" value="<?=$row_usuario['nome']; ?>"> <br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="@mail.com" value="<?=$row_usuario['email']; ?>"> <br>
        
        <label>Senha: </label>
        <input type="password" name="senha" placeholder="senha" value="<?=$row_usuario['senha']; ?>"> <br>

        <input type="submit" value="editar">
    </form>
    
</body>
</html>