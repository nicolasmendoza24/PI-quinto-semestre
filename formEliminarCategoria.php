<?php
  require 'autenticar.php';
	require 'funciones/conexion.php';
	require 'funciones/funcionesCategorias.php';
	$categoria = verCategoriaPorID();
  $chequeo = checkProductos();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        <div class="card border-danger col-md-6 mx-auto mb-3">
        	<div class="card-header text-danger">
        		<h1>Confirmación de baja de categoría</h1>
        	</div>
        	<div class="card-body">

        <?php
          if($chequeo) 
          {
        ?>
            <p>No se puede eliminar la categoría por tener productos relacionados.</p>
            <p><a href="adminCategorias.php" class="btn btn-secondary">Volver a panel de categorías</a></p>
            <script>
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'La categoría tiene productos relacionados!'
            })
            </script>

        <?php
          }
          else
          {
        ?>
        		<h2><?= $categoria['catNombre']; ?></h2>
        		<form action="eliminarCategorias.php" method="post">
        			 <input type="hidden" name="idCategoria" value="<?= $categoria['idCategoria']; ?>">
					     <button class="btn btn-danger mb-3">Confirmar Baja</button>
					     <a href="adminCategoria.php" class="btn btn-outline-secondary mb-3">Volver al panel de Categoría</a>
    				</form>
            <script>
            Swal.fire({
              title: '¿Está seguro que desea eliminar la categoría?',
              text: "No podrá deshacer esta acción.",
              type: 'warning',
              showCancelButton: true,
              cancelButtonText: 'Cancelar',
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sí, borrarlo!'
            }).then((result) => {
              if (!result.value) {
                window.location = 'adminCategorias.php';
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