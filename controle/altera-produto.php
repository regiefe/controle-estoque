<?php
	require_once "../vista/cabecalho.php";
	require_once "../modelo/banco-categoria.php";
	require_once "../modelo/banco-produtos.php";
	require_once "logica-usuario.php";
	
	verificaUsuario();
	  
	$dados = $_POST;
	if (array_key_exists('usado', $_POST)){
		$usado = 0;
	}else{
		$usado = 1;
	}
	$produto = new Produto($dados['id'], $dados['produto'], $dados['preco'], $dados['descricao'], $dados['categoria_id'], $usado);

	
	if(alteraProduto($con, $produto)){?>
		<p class="text-success">Produto <?=$produto->produto ?> que custa <?=$produto->preco?> reais, foi alterado</p>
 	<?php }else{
 		$msg = 'Erro ao atualizar produto'
 		?>
		<p class="text-danger">Erro:<?=$msg ?>, ao alterar produto <?=$produto->produto?></p>
	<?php }?>
<?php require_once "../vista/rodape.php" ?>
