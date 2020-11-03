<?php
	require 'autenticar.php';
	require 'funciones/conexion.php';
	require 'funciones/funcionesProductos.php';

	$productos = listarProductos();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución


?>

	<main class="container">
		<h1>Panel de administración de Productos</h1>

		<a href="admin.php" class="btn btn-secondary my-3">Volver a panel principal</a>
		
		<table class="table table-border table-stripped table-hover text-center">
			<thead class="thead-dark">
				<tr>
					<th>NOMBRE</th>
					<th>MARCA</th>
					<th>PRECIO</th>
					<th>CATEGORÍA</th>
					<th>PRESENTACIÓN</th>
					<th>IMAGEN</th>
					<th colspan="2">
						<a href="formAgregarProducto.php" class="btn btn-secondary">agregar</a>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					while ($productoArray = mysqli_fetch_array($productos)) 
					{
				?>
				<tr>
					<td><?php echo $productoArray['prdNombre']; ?></td>
					<td><?php echo $productoArray['mkNombre']; ?></td>
					<td>AR$ <?php echo $productoArray['prdPrecio']; ?></td>
					<td><?php echo $productoArray['catNombre']; ?></td>
					<td><?php echo $productoArray['prdPresentacion']; ?></td>
					<td><img src="images/productos/<?php echo $productoArray['prdImagen']; ?>" alt="" class="img50"></td>
					<td>
						<a href="formModificarProducto.php?idProducto=<?php echo $productoArray['idProducto']; ?>" class="btn btn-outline-secondary">Modificar</a>
					</td>
					<td>
						<a href="formEliminarProducto.php?idProducto=<?php echo $productoArray['idProducto']; ?>" class="btn btn-outline-secondary">Eliminar</a>
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