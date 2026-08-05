<?php
	require_once "cabecalho.php";
	require_once "../modelo/banco-produtos.php";
	require_once "../modelo/con.php";
	require_once "../controle/csrf.php";
	require_once "../controle/logica-usuario.php";

	verificaUsuario();
?>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Produto</th>
			<th>Preço</th>
			<th>Descricao</th>
			<th>Categoria</th>
			<th>Editar</th>
			<th>Remover</th>
		</tr>
	</thead>
	<?php

	$produtos = new BancoProduto($con);

	foreach ($produtos->listaProdutos() as $produto): ?>
		<tbody>
			<tr>
				<td><?=htmlspecialchars($produto['produto'])?></td>
				<td><?= 'R$ ' . number_format($produto['preco'], 2, '.', ',') ?></td>
				<td><?=htmlspecialchars(substr($produto['descricao'], 0, 40))?></td>
				<td><?=htmlspecialchars($produto['categoria_nome'])?></td>
				<td>
					<a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">Alterar</a>
				</td>
				<td>
					<form action="../controle/remove-produto.php" method="POST">
						<input type="hidden" name="csrf_token" value="<?=csrfToken()?>">
						<input type="hidden" name="id" value="<?=$produto['id']?>">
						<button class="btn btn-danger">Remover</button>
					</form>
				</td>
			</tr>
		</tbody>
	<?php endforeach ?>
	<tr>
		<td colspan="6">
			<a class="btn btn-primary" href="produto-formulario.php">Cadastrar</a>
		</td>
	</tr>
</table>

<?php require_once "rodape.php"; ?>
