<?php
	require 'autenticar.php';
    require 'funciones/conexion.php';
    require 'funciones/funcionesUsuarios.php';
    $usuario = verUsuarioPorID();
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

	<main class="container">
		<h1>Formulario de modificación nuevo Usuario</h1>
		
		<div class="card bg-light p-3">
			<form action="modificarUsuario.php" method="post">
				<input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario']; ?>">

				<label for="nombre" class="w-100 mt-3">Nombre del Usuario</label>
				<input type="text" name="usuNombre" id="nombre" class="form-control" value="<?= $usuario['usuNombre']; ?>">

				<label for="apellido" class="w-100 mt-3">Apellido del Usuario</label>
				<input type="text" name="usuApellido" id="apellido" class="form-control" value="<?= $usuario['usuApellido']; ?>">

				<label for="email" class="w-100 mt-3">Email del Usuario</label>
				<input type="email" name="usuEmail" id="email" class="form-control" value="<?= $usuario['usuEmail']; ?>">

				<label for="clave" class="w-100 mt-3">Clave del Usuario</label>
				<input type="password" name="usuPass" id="clave" class="form-control" value="<?= $usuario['usuPass']; ?>">

				<label for="estado" class="w-100 mt-3">Estado del Usuario</label>
				<div>
					<?php
						if ($usuario['usuEstado'] == 1)
						{
					?>
						<input name="usuEstado" type="radio" required id="estado" value="1" checked="checked"> Activo
						<input type="radio" name="usuEstado" id="estado" value="0" required class="ml-4"> Inactivo
					<?php 
						}
						else 
						{
					?>
						<input name="usuEstado" type="radio" required id="estado" value="1"> Activo
						<input type="radio" name="usuEstado" id="estado" value="0" required class="ml-4" checked="checked"> Inactivo
					<?php
						}
					?>
			  </div>

				<button class="btn btn-secondary my-4">Modificar Usuario</button>
				<a href="adminUsuarios.php" class="btn btn-outline-secondary my-3">volver a panel de usuarios</a>
			</form>
		</div>
	</main>

<?php include 'includes/footer.php'; ?>