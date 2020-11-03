<?php
	require 'autenticar.php';
	require 'funciones/conexion.php';
	require 'funciones/funcionesCategorias.php';

	$categorias = listarCategorias();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución


?>

    <main class="container">
        <h1>Panel de administración de Categorías</h1>

        <a href="admin.php" class="btn btn-secondary my-3">Volver a panel principal</a>
		
		<table class="table table-border table-stripped table-hover">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>CATEGORÍA</th>
					<th colspan="2">
						<a href="formAgregarCategoria.php" class="btn btn-secondary">agregar</a>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					while ($categoriaArray = mysqli_fetch_array($categorias)) 
					{
				?>
				<tr>
					<td><?php echo $categoriaArray[0]; ?></td>
					<td><?php echo $categoriaArray[1]; ?></td>
					<td>
						<a href="formModificarCategoria.php?idCategoria=<?php echo $categoriaArray[0]; ?>" class="btn btn-outline-secondary">Modificar</a>
					</td>
					<td>
						<a href="formEliminarCategoria.php?idCategoria=<?php echo $categoriaArray[0]; ?>" class="btn btn-outline-secondary">Eliminar</a>
					</td>
				</tr>
				<?php 
					}
				 ?>
			</tbody>
		</table>

		<a href="admin.php" class="btn btn-secondary my-3">Volver a panel principal</a>

    </main>

<?php include 'includes/footer.php'; ?>