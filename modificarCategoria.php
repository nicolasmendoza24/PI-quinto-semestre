<?php
	require 'funciones/conexion.php';
	require 'funciones/funcionesCategorias.php';
	$chequeo = modificarCategoria();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <h1>Modificación de datos de una categoría</h1>
		<?php 

		$clase = 'danger';
		$mensaje = 'no se pudo modificar la categoría';

		if($chequeo)
		{
			$clase = 'success';
			$mensaje = 'categoría modificada correctamente';
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