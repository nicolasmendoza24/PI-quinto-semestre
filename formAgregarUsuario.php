<?php
	require 'autenticar.php';
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

	<main class="container">
		<h1>Formulario de alta nuevo Usuario</h1>
		
		<div class="card bg-light p-3">
			<form action="agregarUsuario.php" method="post">

				<label for="nombre" class="w-100 mt-3">Nombre del Usuario</label>
				<input type="text" name="usuNombre" id="nombre" class="form-control" required>

				<label for="apellido" class="w-100 mt-3">Apellido del Usuario</label>
				<input type="text" name="usuApellido" id="apellido" class="form-control" required>

				<label for="email" class="w-100 mt-3">Email del Usuario</label>
				<input type="email" name="usuEmail" id="email" class="form-control" required>

				<label for="clave" class="w-100 mt-3">Clave del Usuario</label>
				<input type="password" name="usuPass" id="clave" class="form-control" required>

				<label for="estado" class="w-100 mt-3">Estado del Usuario</label>
				<div>
					<input type="radio" name="usuEstado" id="estado" value="1" required> Activo
					<input type="radio" name="usuEstado" id="estado" value="0" required class="ml-4"> Inactivo
				</div>

				<button class="btn btn-secondary my-4">Agregar Usuario</button>
				<a href="adminUsuarios.php" class="btn btn-outline-secondary my-3">volver a panel de usuarios</a>
			</form>
		</div>
	</main>

<?php include 'includes/footer.php'; ?>