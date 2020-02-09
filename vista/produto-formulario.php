<?php
require_once "cabecalho.php";
require_once "../modelo/banco-categoria.php";
require_once "../controle/logica-usuario.php";

verificaUsuario();

$categorias = listaCategorias($con);
?>
	<div class="container">
		<h1>Formulario de Produtos</h1>
		<form action="../controle/adiciona-produto.php" method="POST">
			<table class="table">
				<?php require_once "produto-formulario-base.php" ?>
			</table>
		</form>	
	</div>
	
<?php require_once "rodape.php" ?>
