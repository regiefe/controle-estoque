<?php
	require_once "../vista/cabecalho.php";
	require_once "../modelo/banco-categoria.php";
	require_once "../modelo/banco-produtos.php";
	require_once "logica-usuario.php";
	
	verificaUsuario();
	  
	$dados = $_POST;
	if (array_key_exists('usado', $_POST)){
		$usado = "true";
	}else{
		$usado = "false";
	}
	$produto = new Produto($dados['id'], $dados['nome'], $dados['preco'], $dados['descricao'], $dados['categoria_id'], $usado);

	
	if(alteraProduto($con, $produto)){?>
		<p class="text-success">Produto <?=$produto->nome ?> que custa <?=$produto->preco?> reais, foi alterado</p>
 	<?php }else{
 		$msg = mysqli_error($con)
 		?>
		<p class="text-danger">Erro:<?=$msg ?>, ao alterar produto <?=$produto->nome?></p>
	<?php }?>
<?php require_once "../vista/rodape.php" ?>
