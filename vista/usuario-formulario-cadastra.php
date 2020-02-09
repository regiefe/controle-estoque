<?php
    require_once  '../controle/cadastra-usuario.php';  
    require_once 'cabecalho.php';
    require_once '../modelo/banco-usuario.php';
    require_once '../modelo/con.php';
    $lsUsuario = listaUsuarios($con);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>
</head>
<body>
    <form action="../controle/cadastra-usuario.php" method='post' autocomplete="off">
        <table class="table">
            <tr>
                <td>Email</td>
                <td><input class="form-control" type="email" name="email" required ></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input class="form-control" type="password" name="senha" required></td>
            </tr>
            <tr>
                <td>Confirma</td>
                <td><input class="form-control" type="password" name="confirma" required></td>
            </tr>
            <tr>
                <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
            </tr>   
        </table>
    </form> 
<h2>Usuario cadastrado</h2>
<?php foreach($lsUsuario as $usuario):?>
<table class="table">
  <tr>
    <td>Email</td>
    <td><?=$usuario['email']?></td>  
  </tr> 
</table>
<?php endforeach;?>  
</body>
</html>
<?php require_once 'cabecalho.php';?>