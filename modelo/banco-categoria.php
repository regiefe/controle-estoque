<?php
	require_once "con.php";
	function  listaCategorias($con)
	{
		$categorias = [];
		$query = "SELECT * FROM categoria";
		$res = mysqli_query($con, $query);
		while($categoria = mysqli_fetch_assoc($res))
		{
			array_push($categorias, $categoria);
		}
		return $categorias;
	}
