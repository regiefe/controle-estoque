<?php
    require_once  '../modelo/banco-usuario.php';
    require_once  '../modelo/con.php';
    require_once  '../controle/logica-usuario.php';
    require_once  '../controle/csrf.php';
    require_once 'cabecalho.php';

    verificaUsuario();
    $lsUsuario = listaUsuarios($con);
?>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <form action="../controle/cadastra-usuario.php" method='post' autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?=csrfToken()?>">
            <table class="table">
                <tr>
                    <td>Email</td>
                    <td><input class="form-control" type="email" name="email" required></td>
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
    </div>
    <?php require_once 'usuario-lista.php'; ?>