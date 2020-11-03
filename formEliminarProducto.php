<?php
  require 'autenticar.php';
	require 'funciones/conexion.php';
	require 'funciones/funcionesProductos.php';
	$producto = verProductoPorID();

	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
?>

    <main class="container">
        
        <div class="card border-danger col-md-6 mx-auto mb-3">
        	<div class="card-header text-danger">
        		<h1>Confirmación de baja de producto</h1>
        	</div>
        	<div class="card-body">
        		<h2><?= $producto['prdNombre']; ?></h2>
        		<p class="text-center"><img src="images/productos/<?= $producto['prdImagen']; ?>" alt=""></p>
        		<p>Precio: <?= $producto['prdPrecio']; ?></p>
        		<p>Marca: <?= $producto['mkNombre']; ?></p>
        		<p>Categoría: <?= $producto['catNombre']; ?></p>
        		<p>Presentación: <?= $producto['prdPresentacion']; ?></p>
        		<p>Stock: <?= $producto['prdStock']; ?></p>
        		<form action="eliminarProducto.php" method="post">
        			<input type="hidden" name="idProducto" value="<?= $producto['idProducto']; ?>">
                    <input type="hidden" name="prdImagen" value="<?= $producto['prdImagen']; ?>">
					<button class="btn btn-danger mb-3">Confirmar Baja</button>
					<a href="adminProductos.php" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
				</form>
        	</div>
        </div>

    </main>

<script>
Swal.fire({
  title: '¿Está seguro que desea eliminar el producto?',
  text: "No podrá deshacer esta acción.",
  type: 'warning',
  showCancelButton: true,
  cancelButtonText: 'Cancelar',
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí, borrarlo!'
}).then((result) => {
  if (!result.value) {
    window.location = 'adminProductos.php';
  }
})
</script>

<?php include 'includes/footer.php'; ?>