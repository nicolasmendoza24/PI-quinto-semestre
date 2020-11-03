<?php
	require 'autenticar.php';
    require 'funciones/conexion.php';
    require 'funciones/funcionesCategorias.php';
    $categoria = verCategoriaPorID();
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <h1>Formulario de modificación de Categoría</h1>
		
		<div class="card bg-light p-3">
			<form action="modificarCategoria.php" method="post">
				<input type="hidden" name="idCategoria" value="<?= $categoria['idCategoria']; ?>">
				<label for="nombre" class="w-100">Nombre de la Cateogoría</label>
				<input type="text" name="catNombre" id="nombre" class="form-control" value="<?= $categoria['catNombre']; ?>">
				<button class="btn btn-secondary my-3">Modificar Categoría</button>
				<a href="adminCategorias.php" class="btn btn-outline-secondary my-3">volver a panel de categorías</a>
			</form>
		</div>
    </main>

<?php include 'includes/footer.php'; ?>