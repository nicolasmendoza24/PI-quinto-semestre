<?php

	require 'funciones/conexion.php';
	require 'funciones/funcionesCategorias.php';
	$chequeo = agregarCategoria();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

	<main class="container">
		<h1>Alta Categoría</h1>
		
		<?php 

		$clase = 'danger';
		$mensaje = 'no se pudo agregar la categoría';

		if($chequeo)
		{
			$clase = 'success';
			$mensaje = 'categoría agregada correctamente';
		}

		 ?>
		
		<div class="alert alert-<?php echo $clase ?>">
			<?php echo $mensaje ?>.
			<br>
			<a href="adminCategorias.php" class="btn btn-outline-secondary">
				volver a panel de categorías
			</a>
		</div>
	</main>

<?php include 'includes/footer.php'; ?>