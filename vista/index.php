<?php
require_once "cabecalho.php";
require_once "../controle/logica-usuario.php";
require_once "../controle/csrf.php";
?>

<h1>Loja virtual</h1>
<?php if(usuarioEstaLogado()): ?>
<p class="text-success">Você esta logado como <?=htmlspecialchars(usuarioLogado())?></p>
<a class="btn btn-info" href="usuario-formulario.php">Cadastrar outro usuario</a>
<a class="btn btn-warning" href="../controle/logout.php">Sair</a>

<?php else: ?>
<h2>Login</h2>
<form action="../controle/login.php" method="post" autocomplete="off">
    <input type="hidden" name="csrf_token" value="<?=csrfToken()?>">
    <table class="table">
      <tr>
        <td>Email</td>
        <td><input class="form-control" type="email" name="email" required></td>
      </tr>
      <tr>
        <td>senha</td>
        <td><input class="form-control" type="password" name="senha" required></td>
      </tr>
        <tr>
          <td><button class="btn btn-primary">Logar</button></td>
        </tr>
      </tr>
    </table>
</form>
<?php endif;
require_once "rodape.php";?>
