<?php
  require 'autenticar.php';
	require 'funciones/conexion.php';
	require 'funciones/funcionesMarcas.php';
	$marca = verMarcaPorID();
  $chequeo = checkProductos();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <div class="card border-danger col-md-6 mx-auto mb-3">
          <div class="card-header text-danger">
            <h1>Confirmación de baja de marca</h1>
          </div>
          <div class="card-body">

        <?php
          if($chequeo) 
          {
        ?>
            <p>No se puede eliminar la marca por tener productos relacionados.</p>
            <p><a href="adminMarcas.php" class="btn btn-secondary">Volver a panel de marcas</a></p>
            <script>
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'La marca tiene productos relacionados!'
            })
            </script>

        <?php
          }
          else
          {
        ?>
        		<h2><?= $marca['mkNombre']; ?></h2>
        		<form action="eliminarMarcas.php" method="post">
        			 <input type="hidden" name="idMarca" value="<?= $marca['idMarca']; ?>">
					     <button class="btn btn-danger mb-3">Confirmar Baja</button>
					     <a href="adminMarcas.php" class="btn btn-outline-secondary mb-3">Volver al panel de Marcas</a>
				    </form>
            <script>
            Swal.fire({
              title: '¿Está seguro que desea eliminar la marca?',
              text: "No podrá deshacer esta acción.",
              type: 'warning',
              showCancelButton: true,
              cancelButtonText: 'Cancelar',
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sí, borrarla!'
            }).then((result) => {
              if (!result.value) {
                window.location = 'adminMarcas.php';
              }
            })
            </script>
        <?php
          }
        ?>
          </div>
        </div>
    </main>




<?php include 'includes/footer.php'; ?>