<?php
	require 'funciones/conexion.php';
	require 'funciones/funcionesUsuarios.php';
	$chequeo = agregarUsuario();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

	<main class="container">
		<h1>Alta usuario</h1>
		
		<?php 

		$clase = 'danger';
		$mensaje = 'no se pudo agregar el usuario';

		if($chequeo)
		{
			$clase = 'success';
			$mensaje = 'usuario agregado correctamente';
		}

		 ?>
		
		<div class="alert alert-<?php echo $clase ?>">
			<?php echo $mensaje ?>.
			<br>
			<a href="adminUsuarios.php" class="btn btn-outline-secondary">
				volver a panel de usuarios
			</a>
		</div>
	</main>

<?php include 'includes/footer.php'; ?>