<?php
	require_once "../vista/cabecalho.php";
	require_once "../modelo/banco-produtos.php";
	require_once "../modelo/con.php";
	require_once "logica-usuario.php";
	require_once "../modelo/classes/Produto.php";

	verificaUsuario();

	$dados = $_POST;
	if (array_key_exists('usado', $dados)){
		$usado = "true";
	}else{
		$usado = "false";
	}
	$produto = new Produto($dados['id'], $dados['nome'], $dados['preco'], $dados['descricao'], $dados['categoria_id'], $usado);
	
	if(insereProduto($con, $produto)){?>
		<p class="text-success">Adicionado produto <?=$produto->nome ?> que custa <?=$produto->preco?> reais. </p>
		
 	<?php header("Location: ../vista/produto-lista.php"); }else{
 		$msg = mysqli_error($con)
 		?>
		<p class="text-danger">Erro ao adicionar produto <?=$produto->nome?>: <?=$msg ?> </p>
	<?php }?>
<?php require_once "../vista/rodape.php" ?>
