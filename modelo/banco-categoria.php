<?php
	require_once "con.php";
	function  listaCategorias($con) {
		$categorias = [];
		$sql = "SELECT * FROM categoria";
		$resultado = $con->query($sql);

		while($categoria = $resultado->fetch()) {
			array_push($categorias, $categoria);
		}
		return $categorias;
	}
