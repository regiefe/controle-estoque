<?php
	require_once '../modelo/banco-usuario.php';
	require_once '../modelo/con.php';
	require_once '../controle/logica-usuario.php';
	require_once '../controle/csrf.php';

	verificaUsuario();
	$bancoUsuario = new BancoUsuario($con);
	$lsUsuario = $bancoUsuario->listaUsuarios();
?>
<h2>Usuários cadastrados</h2>
<?php foreach ($lsUsuario as $usuario): ?>
	<table class="table">
		<tr>
			<td>Email</td>
			<td><?=htmlspecialchars($usuario['email'])?></td>
			<td>
				<form action="../controle/remover-usuario.php" method="post">
					<input type="hidden" name="csrf_token" value="<?=csrfToken()?>">
					<input type="hidden" name="id" value="<?=$usuario['id']?>">
					<button class="btn btn-danger">Remover</button>
				</form>
			</td>
		</tr>
	</table>
<?php endforeach; ?>
