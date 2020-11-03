<?php
	require 'funciones/conexion.php';
	require 'funciones/funcionesMarcas.php';
	$chequeo = eliminarMarca();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

	<main class="container">
		<h1>Eliminar marca</h1>

		<?php 

		$clase = 'danger';
		$mensaje = 'no se pudo eliminar la marca';

		if($chequeo)
		{
			$clase = 'success';
			$mensaje = 'marca eliminada correctamente';
		}

		 ?>

		<div class="alert alert-<?php echo $clase ?>">
			<?php echo $mensaje ?>
			<br>
			<a href="adminMarcas.php" class="btn btn-outline-secondary">
				volver a panel de marcas
			</a>
		</div>
	</main>

<?php include 'includes/footer.php'; ?>