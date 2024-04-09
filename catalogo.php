<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="SergiCodeDev">
  <title>LitelToy</title>
  <meta name="description"
    content="Compra de juguetes a medida, compra solo las piezas o juguetes que necesites.">
  <meta name="keywords" content="tienda, juguetes, niños, liteltoy"/>
  <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/favicon/site.webmanifest">
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="/iconos/css/fontawesome.min.css" />
  <link rel="stylesheet" href="/iconos/css/solid.min.css">
  <link rel="stylesheet" href="/iconos/css/brands.min.css">
  <link rel="stylesheet" href="/css/estilos.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-nav sticky-top">
    <div class="container-fluid px-md-4 mx-md-2">
      <a class="navbar-brand p-0 me-0 me-lg-2 d-flex align-middle" href="./" aria-label="Oreja">
        <img src="./img/logo.png" width="32" height="32" class="d-block my-1">
        <span class="text-titulo">LitelToy</span>
      </a>

      <button class="navbar-toggler" type="button" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-1-25rem" id="navbarSupportedContent">
        <ul class="navbar-nav mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-titulo hover-nav" aria-current="page" href="./index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-hover hover-nav" href="#">Catalogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-hover hover-nav" href="./contacto.html">Contacto</a>
          </li>

        </ul>
        <ul class="navbar-nav mb-lg-0 icon-ul scala">
          <li><a href="#!"><i class="fa-brands fa-facebook text-titulo"></i></a></li>
          <li><a href="#!"><i class="fa-brands fa-twitter text-titulo"></i></a></li>
          <li><a href="#!"><i class="fa-brands fa-github text-titulo"></i></a></li>
          <li><a href="#!"><i class="fa-solid fa-envelope text-titulo"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- barra desplegada -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel"><a class="navbar-brand p-0 me-0 me-lg-2 d-flex align-middle"
          href="./" aria-label="Oreja">
          <img src="./img/logo.png" width="32" height="32" class="d-block my-1">
          <span class="text-titulo">LitelToy</span>
        </a></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body text-1-25rem">

      <ul class="navbar-nav mb-lg-0 text-center">
        <li class="nav-item">
          <a class="nav-link active text-titulo hover-nav" aria-current="page" href="./index.html">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-hover hover-nav" href="#">Catalogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-hover hover-nav" href="./contacto.html">Contacto</a>
        </li>

      </ul>
      <ul class="navbar-nav mb-lg-0 icon-ul p-0 scala theborde">
        <li class="px-2"><a href="#!"><i class="fa-brands fa-facebook text-titulo"></i></a></li>
        <li class="px-2"><a href="#!"><i class="fa-brands fa-twitter text-titulo"></i></a></li>
        <li class="px-2"><a href="#!"><i class="fa-brands fa-github text-titulo"></i></a></li>
        <li class="px-2"><a href="#!"><i class="fa-solid fa-envelope text-titulo"></i></a></li>
      </ul>

    </div>
  </div>
  <!-- barra desplegada -->

  <div class="cat-aticulos container-fluid p-4 px-3 px-md-5">
    <h2 class="custom-text-articulos">Catalogo de articulos</h2>

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
                        <h2 class="text-center sombra-texto">No se encontraron artículos</h2>
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
                
                <div class="col ">
                  <div class="card-custom h-100">
                    <div class="card-imagen">
                      <img src="./img/<?php echo $datosarticulo['imagen'] ?>" alt="<?php echo $datosarticulo['titulo'] ?>">
                    </div>
                    <div class="card-detalles">
                      <div class="card-contenido">
                        <h3><?php echo $datosarticulo['titulo'] ?> <br><span><?php echo $datosarticulo['categoria'] ?></span></h3>
                        <p><?php echo $datosarticulo['descripcion'] ?></p>
                        <div class="card-comprar">
                          <h4><?php
                                        $pre = number_format($datosarticulo['precio'],2, ',', '.')."€";
                                        list($entera, $decimal) = explode(',', $pre);
                                        echo $entera.",".$decimal;
                                        ?>
                                        </h4>
                          <button>Comprar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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

    <!------------------
    <div class="card-custom h-100">
      <div class="card-imagen">
        <img src="/img/producto3.jpg" alt="">
      </div>
      <div class="card-detalles">
        <div class="card-contenido">
          <h3>Liteltoy Stormtrooper con Cuadro <br><span>Conjunto de Figuritas</span></h3>
          <p>Un set de seis muñecos de liteltoy con la heroína Ahsoka Tano y sus fieles soldados clones. Ideal para los fans de la serie Star Wars: The Clone Wars y sus aventuras galácticas.</p>
          <div class="card-comprar">
            <h4>20.99€</h4>
            <button>Comprar</button>
          </div>
        </div>
      </div>
    </div>
    ------------------->

  </div>
  
  <div class="cat-aticulos container-fluid p-4 px-3 px-md-5 bg-fondo2 pos-relative min-hheight-10 novedad-box">
  
    <h2 class="nuevos-art">Nuevos articulos</h2>

    <div class="custom-shape-divider-top-1685349630">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
    </div>


    <?php
    // ...
    // Código anterior para conectarse a la base de datos y verificar si el usuario está logueado
    // ...
    include_once("./php/config.php");

    $consulta = "SELECT * FROM articulos ORDER BY fecha DESC LIMIT 2"; // Crea una consulta para obtener los ultimos 2 artículos
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

                <div class="col ">
                  <div class="card-custom h-100">
                    <div class="card-imagen">
                      <img src="./img/<?php echo $datosarticulo['imagen'] ?>" alt="<?php echo $datosarticulo['titulo'] ?>">
                    </div>
                    <div class="card-detalles">
                      <div class="card-contenido">
                        <h3><?php echo $datosarticulo['titulo'] ?> <br><span><?php echo $datosarticulo['categoria'] ?></span></h3>
                        <p><?php echo $datosarticulo['descripcion'] ?></p>
                        <div class="card-comprar">
                          <h4><?php
                                        $pre = number_format($datosarticulo['precio'],2, ',', '.')."€";
                                        list($entera, $decimal) = explode(',', $pre);
                                        echo $entera.",".$decimal;
                                        ?>
                                        </h4>
                          <button>Comprar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

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
    

    <div class="custom-shape-divider-bottom-1684999708">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
      </svg>
    </div>

  </div>

  <div class="fondo-footer">
    <div class="container final">
      <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
        <div class="col mb-3">
          <a href="/index.html" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">

            <img src="./img/logo.png" width="32" height="32" class="bi me-2">
            <span class="text-titulo logo-font">LitelToy</span>
          </a>
          <p class="text-body-secondary">© 2023</p>
        </div>

        <div class="col mb-3">

        </div>

        <div class="col mb-3">

        </div>

        <div class="col mb-3">
          <h5 class="text-titulo">Servicios</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#!" class="nav-link p-0 text-body-secondary">Camisetas</a></li>
            <li class="nav-item mb-2"><a href="#!" class="nav-link p-0 text-body-secondary">Productos</a></li>
            <li class="nav-item mb-2"><a href="#!" class="nav-link p-0 text-body-secondary">Advertencia</a></li>
            <li class="nav-item mb-2"><a href="#!" class="nav-link p-0 text-body-secondary">Ayuda</a></li>
          </ul>
        </div>

        <div class="col mb-3">
          <h5 class="text-titulo">Contacto</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="mailto:liteltoy@liteltoy.com"
                class="nav-link p-0 text-body-secondary">Correo: liteltoy@liteltoy.com</a></li>
            <li class="nav-item mb-2"><a href="tel:+34 666 666 666" class="nav-link p-0 text-body-secondary">Tel: +34
                666
                666 666</a></li>
            <li class="nav-item mb-2"><a href="./contacto.html" class="nav-link p-0 text-body-secondary">Envianos un
                formulario</a></li>

          </ul>
        </div>
      </footer>
    </div>
  </div>


  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>