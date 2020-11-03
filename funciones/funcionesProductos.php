<?php

	#############################
	##### CRUD DE PRODUCTOS #####

	function listarProductos() 
	{
		$link = conectar();
		$sql = "SELECT idProducto, prdNombre, mkNombre, prdPrecio, catNombre, prdPresentacion, prdImagen
				FROM productos p, categorias c, marcas m
				WHERE p.idMarca = m.idMarca AND 
				p.idCategoria = c.idCategoria";

		$listadoProductos = mysqli_query($link, $sql);
		return $listadoProductos;
	}

	function subirArchivo() // función tanto para alta como para modificación
	{
		$ruta = 'images/productos/';
		$prdImagen = 'noDisponible.jpg';

		if ( isset($_POST['imagenOriginal'])) { // Compruebo si tengo imagen, y no mandaron nueva, no hago nada.
			$prdImagen = $_POST['imagenOriginal'];
		}

		if ($_FILES['prdImagen']['error'] == 0) // Si mandaron nueva imagen... hago esto:
		{
			//$prdImagen = $_FILES['prdImagen']['name'];
			if ( isset($_POST['imagenOriginal']) && $_POST['imagenOriginal'] != 'noDisponible.jpg') // Esta parte es para MODIFICAR. Si viene con un valor y ese valor es distinto a noDisponible, eliminino el archivo.
			{
				$ruta = 'images/productos/';
					unlink ($ruta.$_POST['imagenOriginal']);
			}
			
			$userfile_name = $_FILES['prdImagen']['name']; // Aquí doy de alta el nuevo archivo
			$userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1); // le asigno un nombre random al archivo
			$prdImagenSinPunto = str_replace( '.','',microtime() );
			$prdImagen = str_replace(' ', '', $prdImagenSinPunto).'.'.$userfile_extn;// respeto la extensión del archivo
			$prdImagenTmp = $_FILES['prdImagen']['tmp_name'];
			move_uploaded_file($prdImagenTmp, $ruta.$prdImagen); // Define dos parámetros de donde y a donde.
		}
		return $prdImagen;

	}

	function agregarProducto() 
	{
		$prdNombre 			= $_POST['prdNombre'];
		$prdPrecio 			= $_POST['prdPrecio'];
		$idMarca 			= $_POST['idMarca'];
		$idCategoria 		= $_POST['idCategoria'];
		$prdPresentacion 	= $_POST['prdPresentacion'];
		$prdStock 			= $_POST['prdStock'];
		$prdImagen 			= subirArchivo();

		$link = conectar();
		$sql = "INSERT INTO productos (prdNombre, prdPrecio, idMarca, idCategoria, prdPresentacion, prdStock, prdImagen) 
		VALUES ('".$prdNombre."', ".$prdPrecio.", ".$idMarca.", ".$idCategoria.", '".$prdPresentacion."', ".$prdStock.", '".$prdImagen."')";

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;

	}


	function verProductoPorID() 
	{
		$idProducto	= $_GET['idProducto'];
		$link = conectar();
		$sql = "SELECT idProducto, prdNombre, p.idMarca, mkNombre, prdPrecio, p.idCategoria, catNombre, prdPresentacion, prdStock, prdImagen
				FROM productos p, categorias c, marcas m
				WHERE p.idMarca = m.idMarca 
				AND p.idCategoria = c.idCategoria
				AND idProducto = ".$idProducto;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		$detalle = mysqli_fetch_array($resultado);
		return $detalle;

	}

	function modificarProducto() 
	{
		$idProducto 		= $_POST['idProducto'];
		$prdNombre 			= $_POST['prdNombre'];
		$prdPrecio 			= $_POST['prdPrecio'];
		$idMarca 			= $_POST['idMarca'];
		$idCategoria 		= $_POST['idCategoria'];
		$prdPresentacion 	= $_POST['prdPresentacion'];
		$prdStock 			= $_POST['prdStock'];
		$prdImagen 			= subirArchivo();

		$link = conectar();
		$sql = "UPDATE productos
		SET prdNombre = '".$prdNombre."', 
			prdPrecio = ".$prdPrecio.",
			idMarca = ".$idMarca.",
			idCategoria = ".$idCategoria.",
			prdPresentacion = '".$prdPresentacion."', 
			prdStock = ".$prdStock.",
			prdImagen = '".$prdImagen."'
		WHERE 
			idProducto = ". $idProducto;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;
	}

	function eliminarImagen()
	{
		$prdImagen 	= $_POST['prdImagen'];
		if ($prdImagen != 'noDisponible.jpg') {
			$ruta = 'images/productos/';
				unlink ($ruta.$prdImagen);
		}
		return $prdImagen;
	}

	function eliminarProducto() 
	{
		$idProducto = $_POST['idProducto'];
		$prdImagen = eliminarImagen();
		$link = conectar();

		$sql = "DELETE FROM productos WHERE idProducto = ". $idProducto;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;
	}
