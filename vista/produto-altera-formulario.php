<?php
require_once "cabecalho.php";
require_once "../modelo/banco-categoria.php";
require_once "../modelo/banco-produtos.php";
require_once "../modelo/con.php";
require_once "../controle/logica-usuario.php";

verificaUsuario();
$id = $_GET['id'];

$produto = new BancoProduto($con);

$produto = $produto->buscaProduto($id);

$categorias = listaCategorias($con);
$usado = $produto->usado ? "checked='checked'" : "";
   
?>
	<h1>Alterando Produtos</h1>
	<form action="../controle/altera-produto.php" method="POST">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<table class="table">
			<?php require_once "produto-formulario-base.php" ?>
		</table>
	</form>
<?php require_once "rodape.php" ?>