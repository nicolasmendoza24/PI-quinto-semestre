<?php

	require 'funciones/conexion.php';
	require 'funciones/funcionesUsuarios.php';
	$chequeo = modificarUsuario();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <h1>Modificación de datos de un usuario</h1>
		<?php 

		$clase = 'danger';
		$mensaje = 'no se pudo modificar el usuario';

		if($chequeo)
		{
			$clase = 'success';
			$mensaje = 'usuario modificado correctamente';
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