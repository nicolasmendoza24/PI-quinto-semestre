<?php  
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución

	$error = isset($_GET['error']);
?>

    <main class="container">
        <h1>Ingresar al sistema</h1>

        <form class="card bg-light col-md-6 mx-auto p-3" action="login.php" method="post">
			<?php

			if ($error == 1) 

			{
			?>

			<h4 class="text-danger">Las credenciales son incorrectas</h4>
			
			<?php
			}
			?>


			Usuario:
			<input type="email" name="usuEmail" class="form-control">
			<br>
			Clave:
			<input type="password" name="usuPass" class="form-control">
			<br>
			<button class="btn btn-secondary">Ingresar</button>

        	
        </form>
    </main>

<?php
    /*      SI TRAIGO EL DATO Y ES ERRONEO, ENTONCES GENERO UN CARTEL DE ADVERTENCIA.        */
    if (isset($_GET['error'])) 
    {
    	$error=$_GET['error'];
    	$mensaje= 'Debe loguearse para ingresar';
    	if ($error ==1) {
    		$mensaje = 'usuario y/o clave incorrecta';
    	}
 
?>
    <!-- GENERO UN SCRIP PARA QUE LANCE UN CARTEL DE AVERTENCIA POR EL USUARIO Y/O CONTRASEÑA ERRONEA-->
        <script>
            Swal.fire(
                'Advertencia',
                '<?= $mensaje; ?>',
                'error',
            )
        </script>

<?php
// CIERRO LA LLAVE DEL IF
    }
 ?>





<?php include 'includes/footer.php'; ?>