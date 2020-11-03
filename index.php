<?php  
	require 'funciones/conexion.php';
	include 'includes/header.html';
	include 'includes/nav.php'; 
	// requiere se usa para incluir librerías. Interrume la ejecución
	require 'funciones/funcionesProductos.php';
	$productos=listarProductos();
?>

    <main class="container">
        <h1>Catalogo de Productos</h1>

        <div class="row">

<?php 


// SOLO TRAE EL ARRAY ASOCIATIVO . NO TRAE LOS INDICES.


while ($producto=mysqli_fetch_assoc($productos)) {
	


 ?>


        	<div class="card m-2">
        		<div class="card-header">
        			<?=$producto ['prdNombre']; ?>
        		</div>
        		<div class="card-body">
        			<img src="images/productos/<?=$producto ['prdImagen']; ?>" class="img-thumbnail">
        			<br>
        			<?=$producto ['prdPrecio']; ?>
        			<br>
        			<?=$producto ['mkNombre']; ?>
        			<br>
        			<?=$producto ['catNombre']; ?>

        		</div>

        	</div>

<?php 

}

 ?>
    
       



    </main>

<?php include 'includes/footer.php'; ?>