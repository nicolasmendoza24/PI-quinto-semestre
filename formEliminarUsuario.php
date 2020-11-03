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
        
        <div class="card border-danger col-md-6 mx-auto mb-3">
        	<div class="card-header text-danger">
        		<h1>Confirmación de baja de usuario</h1>
        	</div>
        	<div class="card-body">
        		<h2><?= $usuario['usuNombre']; ?> <?= $usuario['usuApellido']; ?></h2>
        		<p>Email: <?= $usuario['usuEmail']; ?></p>
        		<p>Estado: <?= $usuario['usuEstado']; ?></p>
        		<form action="eliminarUsuario.php" method="post">
        			<input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario']; ?>">
					<button class="btn btn-danger mb-3">Confirmar Baja</button>
					<a href="adminUsuarios.php" class="btn btn-outline-secondary mb-3">Volver al panel de Usuarios</a>
				</form>
        	</div>
        </div>

    </main>

<script>
Swal.fire({
  title: '¿Está seguro que desea eliminar el usuario?',
  text: "No podrá deshacer esta acción.",
  type: 'warning',
  showCancelButton: true,
  cancelButtonText: 'Cancelar',
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí, borrarlo!'
}).then((result) => {
  if (!result.value) {
    window.location = 'adminUsuarios.php';
  }
})
</script>

<?php include 'includes/footer.php'; ?>