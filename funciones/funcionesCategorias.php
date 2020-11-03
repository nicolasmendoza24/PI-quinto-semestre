<?php  

	##############################
	##### CRUD DE CATEGORÍAS #####

	function listarCategorias() 
	{
		$link = conectar();
		$sql = "SELECT idCategoria, catNombre
				FROM categorias ORDER BY catNombre";

		$listadoCategorias = mysqli_query($link, $sql);
		return $listadoCategorias;
	}

	function agregarCategoria() 
	{
		$catNombre = $_POST['catNombre'];

		$link = conectar();
		$sql = "INSERT INTO categorias (catNombre) VALUES ('".$catNombre."')";
		$resultado = mysqli_query($link, $sql);
		return $resultado;

	}


	function verCategoriaPorID() 
	{
		$idCategoria	= $_GET['idCategoria'];
		$link = conectar();
		$sql = "SELECT idCategoria, catNombre
				FROM categorias
				WHERE idCategoria = ".$idCategoria;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		$detalle = mysqli_fetch_array($resultado);
		return $detalle;
	}

	function modificarCategoria() 
	{
		$idCategoria 		= $_POST['idCategoria'];
		$catNombre 			= $_POST['catNombre'];

		$link = conectar();
		$sql = "UPDATE categorias
		SET catNombre = '".$catNombre."'
		WHERE 
			idCategoria = ". $idCategoria;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;
	}


	function eliminarCategoria() 
	{
		$idCategoria = $_POST['idCategoria'];

		$link = conectar();
		$sql = "DELETE FROM categorias WHERE idCategoria = ". $idCategoria;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;

	}

	// Chequear si hay productos relacionados a esta marca
	function checkProductos() {
		$idCategoria = $_GET['idCategoria'];
		$link = conectar();

		$sql = "SELECT 1 from productos
		WHERE idCategoria = " . $idCategoria; // Consulta para ver si hay algo o no.

		$resultado = mysqli_query($link, $sql)
			or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		$chequeo = mysqli_num_rows($resultado); // Como el mysqli_query devuelve un objeto, debo saber las filas que trae
		return $chequeo;
	}