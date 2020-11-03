<?php
	require 'autenticar.php';
    require 'funciones/conexion.php';
    require 'funciones/funcionesMarcas.php';
    $marca = verMarcaPorID();
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <h1>Formulario de modificación de Marca</h1>
		
		<div class="card bg-light p-3">
			<form action="modificarMarca.php" method="post">
				<input type="hidden" name="idMarca" value="<?= $marca['idMarca']; ?>">
				<label for="nombre" class="w-100">Nombre de la Marca</label>
				<input type="text" name="mkNombre" id="nombre" class="form-control" value="<?= $marca['mkNombre']; ?>">
				<button class="btn btn-secondary my-3">Modificar Marca</button>
				<a href="adminMarcas.php" class="btn btn-outline-secondary my-3">volver a panel de marcas</a>
			</form>
		</div>
    </main>

<?php include 'includes/footer.php'; ?>