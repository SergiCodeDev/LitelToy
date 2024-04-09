<?php
// ...
// Código anterior para conectarse a la base de datos y verificar si el usuario está logueado
// ...
include_once("./php/config.php");

$consulta = "SELECT * FROM articulos"; // Crea una consulta para obtener todos los artículos
$resultado = $conexion->query($consulta); // Ejecuta la consulta
if($resultado) { // Verifica si la consulta se ejecutó correctamente
    if ($resultado->num_rows == 0) { // Verifica si se encontró algún registro
        // Muestra un mensaje si no se encontró ningún artículo
        ?>
        <section class="container mt-4">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">No se encontraron artículos</h2>
                </div>
            </div>
        </section>
        <?php
    } else {
        // Muestra una tarjeta para cada artículo encontrado
        $datosarticulos = $resultado->fetch_all(MYSQLI_ASSOC);

        ?> <div class="row row-cols-1 row-cols-xxl-2 g-5"> <?php

        foreach($datosarticulos as $datosarticulo) {
            ?>
            <section class="container mt-5">
                <div class="row">
                    <div class="col-4">
                        <img src="./img/<?php echo $datosarticulo['imagen'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-8">
                        <h3><?php echo $datosarticulo['articulo']; ?></h3>
                        <div class="row">
                            <div class="col-8">
                                <p><?php echo $datosarticulo['descripcion'] ?></p>
                            </div>
                            <div class="col-4">
                                <p class="class">
                                    <?php
                                    $pre = number_format($datosarticulo['precio'],2, ',', '.')." €";
                                    list($entera, $decimal) = explode(',', $pre);
                                    echo $entera.",<small class='mark'>".$decimal."</small> €";
                                    ?>
                                </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }

        ?> </div> <?php
    }
} else {
    // Muestra un mensaje si hubo un error al ejecutar la consulta
    ?>
    <section class="container mt-4">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Error al obtener los artículos</h2>
            </div>
        </div>
    </section>
    <?php
}
?>








<?php
// ...
// Código anterior para conectarse a la base de datos y verificar si el usuario está logueado
// ...

$consulta = "SELECT * FROM articulos"; // Crea una consulta para obtener todos los artículos
$resultado = $conexion->query($consulta); // Ejecuta la consulta
if($resultado) { // Verifica si la consulta se ejecutó correctamente
    if ($resultado->num_rows == 0) { // Verifica si se encontró algún registro
        // Muestra un mensaje si no se encontró ningún artículo
        ?>
        <section class="container mt-4">
            <div class="row">
                <div class="col">
                    <h2>No se encontraron artículos</h2>
                </div>
            </div>
        </section>
        <?php
    } else {
        // Obtiene todos los artículos en un array
        $datosarticulos = $resultado->fetch_all(MYSQLI_ASSOC);
        
        // Obtiene solo los últimos 3 artículos del array
        $ultimos3articulos = array_slice($datosarticulos, -3);
        
        // Muestra una tarjeta para cada uno de los últimos 3 artículos
        foreach($ultimos3articulos as $datosarticulo) {
            ?>
            <section class="container mt-5">
                <div class="row">
                    <div class="col-4">
                        <img src="./img/<?php echo $datosarticulo['imagen'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-8">
                        <h3><?php echo $datosarticulo['articulo']; ?></h3>
                        <div class="row">
                            <div class="col-8">
                                <p><?php echo $datosarticulo['descripcion'] ?></p>
                            </div>
                            <div class="col-4">
                                <p class="class">
                                    <?php
                                    $pre = number_format($datosarticulo['precio'],2, ',', '.')." €";
                                    list($entera, $decimal) = explode(',', $pre);
                                    echo $entera.",<small class='mark'>".$decimal."</small> €";
                                    ?>
                                </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
} else {
    // Muestra un mensaje si hubo un error al ejecutar la consulta
    ?>
    <section class="container mt-4">
        <div class="row">
            <div class="col">
                <h2>Error al obtener los artículos</h2>
            </div>
        </div>
    </section>
    <?php
}
?>
