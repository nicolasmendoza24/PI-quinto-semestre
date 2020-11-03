<?php
	require 'autenticar.php';
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <h1>Formulario de alta de una nueva Categoría</h1>
		
		<div class="card bg-light p-3">
			<form action="AgregarCategoria.php" method="post">
				<label for="nombre" class="w-100">Nombre de la Cateogoría</label>
				<input type="text" name="catNombre" id="nombre" class="form-control" required>
				<button class="btn btn-secondary my-3">Agregar Categoría</button>
				<a href="adminCategorias.php" class="btn btn-outline-secondary my-3">volver a panel de categorías</a>
			</form>
		</div>
    </main>

<?php include 'includes/footer.php'; ?>