<?php

session_start();

$esteScript = basename(__FILE__);

if ('GET' === $_SERVER['REQUEST_METHOD']) {

    $listaProductos = array();

    $_SESSION["listaProductos"] = $listaProductos;

    $listaDescripcion = null;
    $listaPrecios     = null;
    $listaCantidad    = null;
    $listaSubtotal    = null;

} elseif (isset($_POST["aceptarSubmit"])) {

    if (!isset($_SESSION["listaProductos"]) || empty($_SESSION["listaProductos"])) {
        $listaProductos             = array();
        $_SESSION["listaProductos"] = $listaProductos;
    }

    $listaProductos = $_SESSION["listaProductos"];

    if (!empty($_POST["selectProducto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["cantidad"])) {

        $listaDescripcion = null;
        $listaPrecios     = "\n";
        $listaCantidad    = "\n";
        $listaSubtotal    = "\n";

        $total = 0;

        // Obteniendo datos
        // $productoNombre      = $_POST["selectProducto"];
        // $productoDescripcion = $_POST["descripcion"];
        // $productoPrecio      = $_POST["precio"];
        // $productoCantidad    = $_POST["cantidad"];

        // guardando nuevo producto
        $nuevoItem = array(
            "nombre"      => $_POST["selectProducto"],
            "descripcion" => $_POST["descripcion"],
            "precio"      => $_POST["precio"],
            "cantidad"    => $_POST["cantidad"],

        );

        array_push($listaProductos, $nuevoItem);

        $_SESSION["listaProductos"] = $listaProductos;

        for ($i = 0; $i < count($listaProductos); $i++) {

            $itemNombre      = $listaProductos[$i]["nombre"];
            $itemDescripcion = $listaProductos[$i]["descripcion"];
            $itemPrecio      = $listaProductos[$i]["precio"];
            $itemCantidad    = $listaProductos[$i]["cantidad"];

            $listaDescripcion .= ($i + 1) . ".$itemNombre: $itemDescripcion\n";
            $listaPrecios .= "\t$itemPrecio\n";
            $listaCantidad .= "\t$itemCantidad\n";
            $listaSubtotal .= "\t" . ($itemCantidad * $itemPrecio) . "\n";

            $total += ($itemCantidad * $itemPrecio);

        }

        $_SESSION["listaDescripcion"] = $listaDescripcion;
        $_SESSION["listaPrecios"]     = $listaPrecios;
        $_SESSION["listaCantidad"]    = $listaCantidad;
        $_SESSION["listaSubtotal"]    = $listaSubtotal;
        $_SESSION["total"]            = $total;
        // echo $lista;

    } else {
        echo "<h2>LLene los campos vacios</h2>";

        $listaDescripcion = $_SESSION["listaDescripcion"];
        $listaPrecios     = $_SESSION["listaPrecios"];
        $listaCantidad    = $_SESSION["listaCantidad"];
        $listaSubtotal    = $_SESSION["listaSubtotal"];

        $total = $_SESSION["total"];
    }
} elseif (isset($_POST["nuevo"])) {

    $listaDescripcion = null;
    $listaPrecios     = null;
    $listaCantidad    = null;
    $listaSubtotal    = null;
    $total            = null;
    session_destroy();
} elseif (isset($_POST["botonCancelar"]) || isset($_POST["botonPrincipal"])) {

    header('Location: /index.php');
    exit;
} elseif (isset($_POST["botonAtras"])) {

    header('Location: /ejercicio09');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>Ejercicios con PHP</title>
  </head>

  <body>

    <section class="containerCustom">


      <section class="heroCustom">

        <h1 class="text-white text-3xl py-2">Desarrollo de Aplicaciones Web II</h1>

      </section>

      <div class="info-card">

        <div class="informacion">

          <figure class="imageCustom">
            <img src="../static/senati.png" class="logoCustom">
          </figure>

          <div class="info">

            <div class="info-item">
              <p class="label">Semestre:</p>
              <p class="text">III</p>
            </div>

            <div class="info-item">
              <p class="label">Carrera:</p>
              <p class="text">Ingeniería de Software con Inteligencia Artificial</p>
            </div>

            <div class="info-item">
              <p class="label">Profesor:</p>
              <p class="text">Macedo Alcantara Dayan Fernando</p>
            </div>

            <div class="info-item">
              <p class="label">Alumnos:</p>

              <ul class="text">
                <li></li>
                <li>Jerson Alex Beteta Jeronimo</li>
                <li>Jose Antonio Rashta Valverde</li>
                <li>Joseph Habacuc Alvarez Huaman</li>
                <li>Marco Antonio Alvan Giraldo</li>
                <li>Philip Junior Pérez Castro</li>
              </ul>

            </div>

            <h2 class="anio">2020</h2>
          </div>
        </div>


        <div class="ejercicios p-4">


          <form class="w-full h-full flex-col items-center" action="<?php $esteScript ?>" method="post">

            <h1 class="text-2xl m-4 pb-4 text-center">Ejercicio 10</h1>

            <div class="flex flex-wrap mx-3 mb-2">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Seleccione Producto
                </label>
                <div class="relative">


                  <input class="block appearance-none w-full bg-white-200 border border-blue-500 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  list="productos" name="selectProducto" id="selectProducto"/>
                  <datalist id="productos"></datalist>


                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                  </div>
                </div>
              </div>

              <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                  Descripcion
                </label>
                <input class="appearance-none block w-full bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="descripcion" id="descripcion">
              </div>


            </div>

            <div class="flex flex-wrap mx-3 mb-2 mt-8">

              <div class="flex w-full md:w-3/4 px-3 mb-6 md:mb-0 items-center">

                <div class="flex flex-wrap mx-3 mb-2 text-center">


                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Precio
                    </label>
                    <input class="appearance-none block w-full bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="text" id="precio" name="precio">
                  </div>


                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Cantidad
                    </label>
                    <input class="appearance-none block w-full bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="text" id="cantidad" name="cantidad" value="1">
                  </div>
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Tipo de Cambio
                    </label>
                    <input class="appearance-none block w-full bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="text" id="tipoCambio" name="tipoCambio">
                  </div>


                </div>

              </div>

              <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">

                <div class="flex flex-wrap mx-3 mb-2 items-center justify-center">


                  <button
                          class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded" type="submit" name="aceptarSubmit">
                    Aceptar
                  </button>

                  <button
                          class="bg-green-500 hover:bg-green-700 text-white font-bold m-2 py-2 px-4 border border-green-700 rounded" type="submit" name="nuevo">
                    Nuevo
                  </button>
                </div>

              </div>

            </div>








            <div class="flex flex-wrap mx-3 mb-2 mt-8">

              <!-- textarea -->
              <div class="flex w-full md:w-3/4 px-3 mb-6 md:mb-0 items-center">

                <div class="flex flex-wrap mx-3 mb-2">


                  <div class="w-full md:w-2/5 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Descripcion
                    </label>


                              <?php
if (isset($_POST["aceptarSubmit"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {
    echo "<textarea name='descripcionTextArea' id='descripcionTextArea'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaDescripcion . "</textarea>";
}
?>


                  </div>


                  <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Precio
                    </label>


                              <?php
if (isset($_POST["aceptarSubmit"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {
    echo "<textarea name='precioTextArea' id='precioTextArea'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaPrecios . "</textarea>";
}
?>

                  </div>


                  <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Cantidad
                    </label>

                              <?php
if (isset($_POST["aceptarSubmit"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {
    echo "<textarea name='cantidadTextArea' id='cantidadTextArea' class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaCantidad . "</textarea>";
}
?>

                  </div>


                  <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Subtotal
                    </label>


                    <?php
if (isset($_POST["aceptarSubmit"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {

    echo "<textarea name='subtotal' id='subtotal'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaSubtotal . "</textarea>";
}
?>


                  </div>



                  <div class="w-full px-3 mb-6 md:mb-0 flex justify-end">
                    <div class="flex items-center justify-center w-1/6 mr-6">

                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2  mr-2"
                             for="grid-city">
                        Total:
                      </label>
                      <input  class="appearance-none block w-full bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                             id="grid-city" type="text" name="total"
                             <?php
if (isset($_POST["aceptarSubmit"])) {
    echo "value=$total";
}
?>

                             >
                    </div>

                  </div>
                </div>


              </div>
              <!-- boton -->
              <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">

                <div class="flex flex-wrap mx-3 mb-2 items-center justify-center">


                  <button
                          class="bg-red-500 hover:bg-red-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded" id="botonCancelar" name="botonCancelar">
                    Cancelar
                  </button>

                </div>

              </div>

            </div>


            <div class="flex flex-wrap mx-3 mt-10 mb-2 items-center justify-center">


              <button
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded" name="botonAtras" id="botonAtras">
                << </button>
                  <button
                          class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded" name="botonPrincipal" id="botonPrincipal">
                    Ir seccion principal
                  </button>
                  <!-- <button
                          class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded">
                    Cancelar
                  </button> -->

            </div>


          </form>

        </div>

      </div>
    </section>


    <script src="./productos.js"></script>
  </body>

</html>
