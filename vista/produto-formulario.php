<?php
require_once "cabecalho.php";
require_once "../modelo/banco-categoria.php";
require_once "../modelo/con.php";
require_once "../controle/logica-usuario.php";
require_once "../controle/csrf.php";

verificaUsuario();

$bancoCategoria = new BancoCategoria($con);
$categorias = $bancoCategoria->listaCategorias();
$produto = [];
$usado = '';
$botaoTexto = 'Adicionar';
?>
	<div class="container">
		<h1>Formulario de Produtos</h1>
		<form action="../controle/adiciona-produto.php" method="POST">
			<input type="hidden" name="csrf_token" value="<?=csrfToken()?>">
			<table class="table">
				<?php require_once "produto-formulario-base.php" ?>
			</table>
		</form>
	</div>

<?php require_once "rodape.php"; ?>
