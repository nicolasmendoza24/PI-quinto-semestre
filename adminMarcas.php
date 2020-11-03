<?php
	require 'autenticar.php';
	require 'funciones/conexion.php';
	require 'funciones/funcionesMarcas.php';

	$marcas = listarMarcas();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución


?>

    <main class="container">
        <h1>Panel de administración de Marcas</h1>

        <a href="admin.php" class="btn btn-secondary my-3">Volver a panel principal</a>
		
		<table class="table table-border table-stripped table-hover">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>MARCA</th>
					<th colspan="2">
						<a href="formAgregarMarca.php" class="btn btn-secondary">agregar</a>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					while ($marcaArray = mysqli_fetch_array($marcas)) 
					{
				?>
				<tr>
					<td><?php echo $marcaArray[0]; ?></td>
					<td><?php echo $marcaArray[1]; ?></td>
					<td>
						<a href="formModificarMarca.php?idMarca=<?php echo $marcaArray['idMarca']; ?>" class="btn btn-outline-secondary">Modificar</a>
					</td>
					<td>
						<a href="formEliminarMarca.php?idMarca=<?php echo $marcaArray['idMarca']; ?>" class="btn btn-outline-secondary">Eliminar</a>
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