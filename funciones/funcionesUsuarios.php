<?php  

	############################
	##### CRUD DE USUARIOS #####

	function listarUsuarios() 
	{
		$link = conectar();
		$sql = "SELECT idUsuario, usuNombre, usuApellido, usuEmail, usuEstado
				FROM usuarios";

		$listadoUsuarios = mysqli_query($link, $sql);
		return $listadoUsuarios;
	}

	function agregarUsuario() 
	{
		$usuNombre 		= $_POST['usuNombre'];
		$usuApellido 	= $_POST['usuApellido'];
		$usuEmail 		= $_POST['usuEmail'];
		$usuPass 		= $_POST['usuPass'];
		$usuEstado 		= $_POST['usuEstado'];

		$link = conectar();
		$sql = "INSERT INTO usuarios (usuNombre, usuApellido, usuEmail, usuPass, usuEstado) VALUES ('".$usuNombre."', '".$usuApellido."', '".$usuEmail."', '".$usuPass."', '".$usuEstado."')";
		$resultado = mysqli_query($link,$sql);
		return $resultado;
	}

	function verUsuarioPorID() 
	{
		$idUsuario		= $_GET['idUsuario'];

		$link = conectar();
		$sql = "SELECT idUsuario, usuNombre, usuApellido, usuEmail, usuPass, usuEstado
				FROM usuarios
				WHERE idUsuario = ".$idUsuario;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		$detalle = mysqli_fetch_array($resultado);
		return $detalle;
	}


	function modificarUsuario() 
	{
		$idUsuario 		= $_POST['idUsuario'];
		$usuNombre 		= $_POST['usuNombre'];
		$usuApellido 	= $_POST['usuApellido'];
		$usuEmail 		= $_POST['usuEmail'];
		$usuPass 		= $_POST['usuPass'];
		$usuEstado 		= $_POST['usuEstado'];

		$link = conectar();
		$sql = "UPDATE usuarios
		SET usuNombre = '".$usuNombre."', 
			usuApellido = '".$usuApellido."',
			usuEmail = '".$usuEmail."',
			usuPass = '".$usuPass."',
			usuEstado = ".$usuEstado."
		WHERE 
			idUsuario = ". $idUsuario;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;
	}


	function eliminarUsuario() 
	{
		$idUsuario = $_POST['idUsuario'];

		$link = conectar();
		$sql = "DELETE FROM usuarios WHERE idUsuario = ". $idUsuario;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;
	}

	function login() 
	{
		$usuEmail = $_POST['usuEmail'];
		$usuPass = $_POST['usuPass'];

		$link = conectar();
		$sql = "SELECT usuNombre, usuApellido 
		FROM usuarios
		WHERE usuEmail ='".$usuEmail."' 
		AND usuPass = '".$usuPass."'";

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
					//FUNCION QUE DEVUELVE UN NUMERO IGUAL A LA CANTIDAD DE REGISTROS DEL SELECT
		$chequeo = mysqli_num_rows($resultado);

		//SI SE LOGUEA MAL HACE ESTO:
		if ($chequeo == 0) 
			{
				// Redirección a formLogin.php
				header('location: formLogin.php?error=1');
			}
		//SI SE LOGUEA BIEN HACE ESTO:
		else
			{
				// RUTINA DE AUTENTICACIÓN
				//INICIA UNA SESSION
				session_start(); 			//Inicio sesión 
				$_SESSION['login'] = 1;		// Asigno una variable de sesión

				//GUARDAMOS EL NOMBRE Y APELLIDO DEL USUARIO EN FETCH_ARRAY
				$usuario = mysqli_fetch_array($resultado);
				//ALMACENO EL DATO
				$_SESSION['nombre'] = $usuario['usuNombre'];
				$_SESSION['apellido'] = $usuario['usuApellido'];

				header('location: index.php');
			}

		}

		function logout()
		{
			// session_start(); // No lo inicio acá
			session_destroy();
			header('refresh: 5; url=formLogin.php');
		}
