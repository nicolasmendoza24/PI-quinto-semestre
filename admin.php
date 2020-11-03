<?php  
	require 'autenticar.php';
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <h1>Panel de administración</h1>
		
		<div class="list-group">
			<a href="adminMarcas.php" class="list-group-item">Panel de administración de marcas</a>
			<a href="adminCategorias.php" class="list-group-item">Panel de administración de categorías</a>
			<a href="adminProductos.php" class="list-group-item">Panel de administración de productos</a>
			<a href="adminUsuarios.php" class="list-group-item">Panel de administración de usuarios</a>
		</div>

    </main>

<?php include 'includes/footer.php'; ?>