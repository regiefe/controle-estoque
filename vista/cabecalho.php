<?php
error_reporting(E_ALL ^ E_NOTICE); 
require_once "mostra-alerta.php";
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Minha loja</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link href="../css/loja.css" rel="stylesheet">
	</head>
	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
				   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#loja">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button>
				<a class="navbar-brand" href="../vista/index.php">Minha loja</a>
				</div>
				<div class="collapse navbar-collapse" id="loja">
					<ul class="nav navbar-nav">
						<li><a href="../vista/produto-lista.php">Produtos</a></li>
						<li><a href="../vista/produto-formulario.php">Adiciona Produto</a></li>
						<li><a href="../vista/sobre.php">Sobre</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="principal">
<?php
		mostraAlerta('success');
		mostraAlerta('danger');
 ?>
