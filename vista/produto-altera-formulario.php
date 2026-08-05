<?php
require_once "cabecalho.php";
require_once "../modelo/banco-categoria.php";
require_once "../modelo/banco-produtos.php";
require_once "../modelo/con.php";
require_once "../controle/logica-usuario.php";
require_once "../controle/csrf.php";

verificaUsuario();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    $_SESSION['danger'] = "ID de produto inválido!";
    header("Location: produto-lista.php");
    die();
}

$produto = new BancoProduto($con);
$produto = $produto->buscaProduto($id);

if (!$produto) {
    $_SESSION['danger'] = "Produto não encontrado!";
    header("Location: produto-lista.php");
    die();
}

$categorias = listaCategorias($con);
$usado = $produto['usado'] ? "checked='checked'" : "";
$botaoTexto = 'Alterar';

?>
	<h1>Alterando Produtos</h1>
	<form action="../controle/altera-produto.php" method="POST">
		<input type="hidden" name="csrf_token" value="<?=csrfToken()?>">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<table class="table">
			<?php require_once "produto-formulario-base.php" ?>
		</table>
	</form>
<?php require_once "rodape.php"; ?>