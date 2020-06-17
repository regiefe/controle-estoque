<?php
	require_once "../vista/cabecalho.php";
	require_once "../modelo/banco-produtos.php";
	require_once "../modelo/con.php";
	require_once "logica-usuario.php";
	require_once "../modelo/classes/Produto.php";

	verificaUsuario();

	$_POST;
	
	isset($_POST['usado']) ? $_POST['usado'] = 0 : $_POST['usado'] = 1;

	$produto = new Produto();
	
	foreach($_POST as $prop => $value){
		$produto->$prop = $value;
	}
	

	if(insereProduto($con, $produto)){?>
		<p class="text-success">Adicionado produto <?=$produto->produto ?> que custa <?=$produto->preco?> reais. </p>

        <?php header("Location: ../vista/produto-lista.php"); }
    else{
 		$msg = 'Deu alguma coisa errado';
 		?>
		<p class="text-danger">Erro ao adicionar produto <?=$produto->produto?>: <?=$msg ?> </p>
	<?php }?>
<?php require_once "../vista/rodape.php" ?>
