<?php
	require 'funciones/conexion.php';
	require 'funciones/funcionesCategorias.php';
	$chequeo = eliminarCategoria();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

	<main class="container">
		<h1>Eliminar categoría</h1>

		<?php 

		$clase = 'danger';
		$mensaje = 'no se pudo eliminar la categoría';

		if($chequeo)
		{
			$clase = 'success';
			$mensaje = 'categoría eliminada correctamente';
		}

		 ?>

		<div class="alert alert-<?php echo $clase ?>">
			<?php echo $mensaje ?>.
			<br>
			<a href="adminCategorias.php" class="btn btn-outline-secondary">
				volver a panel de categoría
			</a>
		</div>
	</main>

<?php include 'includes/footer.php'; ?>