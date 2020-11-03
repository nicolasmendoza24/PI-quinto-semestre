<?php  

	require 'autenticar.php';
	require 'funciones/funcionesUsuarios.php';
	logout();
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <h1>Salir del sistema</h1>
        <h3>Gracias <?= $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];; ?></h3>
        <p><a href="formLogin.php">Volver a ingresar</a></p>

    </main>

<?php include 'includes/footer.php'; ?>