<?php

	require 'funciones/conexion.php';
	require 'funciones/funcionesProductos.php';
	$chequeo = modificarProducto();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <h1>Modificacion de datos de un producto</h1>
		<?php 

		$clase = 'danger';
		$mensaje = 'no se pudo modificar el producto';

		if($chequeo)
		{
			$clase = 'success';
			$mensaje = 'producto modificado correctamente';
		}

		 ?>

		<div class="alert alert-<?php echo $clase ?>">
			<?php echo $mensaje ?>.
			<br>
			<a href="adminProductos.php" class="btn btn-outline-secondary">
				volver a panel de productos
			</a>
		</div>
    </main>

<?php include 'includes/footer.php'; ?>