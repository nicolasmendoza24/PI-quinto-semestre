<?php
	require 'autenticar.php';
	require 'funciones/conexion.php';
	require 'funciones/funcionesUsuarios.php';

	$usuarios = listarUsuarios();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución


?>

    <main class="container">
        <h1>Panel de administración de Usuarios</h1>

        <a href="admin.php" class="btn btn-secondary my-3">Volver a panel principal</a>
		
		<table class="table table-border table-stripped table-hover">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>EMAIL</th>
					<th>ESTADO</th>
					<th colspan="2">
						<a href="formAgregarUsuario.php" class="btn btn-secondary">agregar</a>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					while ($usuarioArray = mysqli_fetch_array($usuarios)) 
					{
				?>
				<tr>
					<td><?php echo $usuarioArray[0]; ?></td>
					<td><?php echo $usuarioArray[1]; ?></td>
					<td><?php echo $usuarioArray[2]; ?></td>
					<td><?php echo $usuarioArray[3]; ?></td>
					<td><?php echo $usuarioArray[4]; ?></td>
					<td>
						<a href="formModificarUsuario.php?idUsuario=<?php echo $usuarioArray[0]; ?>" class="btn btn-outline-secondary">Modificar</a>
					</td>
					<td>
						<a href="formEliminarUsuario.php?idUsuario=<?php echo $usuarioArray[0]; ?>" class="btn btn-outline-secondary">Eliminar</a>
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