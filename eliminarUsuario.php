<?php
	require 'funciones/conexion.php';
	require 'funciones/funcionesUsuarios.php';
	$chequeo = eliminarUsuario();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

	<main class="container">
		<h1>Eliminar usuario</h1>

		<?php 

		$clase = 'danger';
		$mensaje = 'no se pudo eliminar el usuario';

		if($chequeo)
		{
			$clase = 'success';
			$mensaje = 'usuario eliminado correctamente';
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