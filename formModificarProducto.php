<?php
    require 'autenticar.php';
    require 'funciones/conexion.php';
    require 'funciones/funcionesMarcas.php';
    require 'funciones/funcionesCategorias.php';
    require 'funciones/funcionesProductos.php';

    $listarMarcas = listarMarcas();
    $listarCategorias = listarCategorias();
    $producto = verProductoPorID();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

<main class="container">
    <h1>Formulario de modificación de Producto</h1>

    <form action="modificarProducto.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idProducto" value="<?= $producto['idProducto']; ?>">
        Nombre: <br>
        <input type="text" name="prdNombre" class="form-control" required value="<?= $producto['prdNombre']; ?>">
        <br>
        Precio: <br>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">AR$</div>
            </div>
            <input type="text" name="prdPrecio" class="form-control" required value="<?= $producto['prdPrecio']; ?>">
        </div>
        <br>
        Marca: <br>
        <select name="idMarca" class="form-control" required>
            <option value="<?= $producto['idMarca']; ?>" selected><?= $producto['mkNombre']; ?></option>
            <?php
                while ($marcaArray = mysqli_fetch_array($listarMarcas)) 
                {
            ?>
            <option value="<?= $marcaArray['idMarca']; ?>"><?= $marcaArray['mkNombre']; ?></option> 
            <?php  
                }
            ?>
        </select>
        <br>
        Categoría: <br>
        <select name="idCategoria" class="form-control" required>
            <option value="<?= $producto['idCategoria']; ?>" selected><?= $producto['catNombre']; ?></option>
            <?php 
                while ($arrayCategorias = mysqli_fetch_array($listarCategorias)) 
                {
            ?>
            <option value="<?= $arrayCategorias['idCategoria']; ?>"><?= $arrayCategorias['catNombre']; ?></option>
            <?php
                }
            ?>
        </select>
        <br>
        Presentacion: <br>
        <textarea name="prdPresentacion" class="form-control"><?= $producto['prdPresentacion']; ?></textarea>
        <br>
        Stock: <br>
        <input type="number" name="prdStock" class="form-control" value="<?= $producto['prdStock']; ?>">
        <br>
        Imagen: <br>
        <input type="hidden" name="imagenOriginal" value="<?= $producto['prdImagen']; ?>"><!-- mando el nombre actual, por si no modifico la imagen -->
        <img src="images/productos/<?= $producto['prdImagen']; ?>" alt="">
        <input type="file" name="prdImagen" class="form-control">

        <br>
        <input type="submit" value="Modificar Producto" class="btn btn-secondary mb-3">
        <a href="adminProductos.php" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
    </form>

</main>

<?php  include 'includes/footer.php';  ?>