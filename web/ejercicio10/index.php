<?php

session_start();

$esteScript = basename(__FILE__);

if ('GET' === $_SERVER['REQUEST_METHOD']) {

    $listaProductos = array();

    $_SESSION["listaProductos"] = $listaProductos;

} elseif (isset($_POST["aceptarSubmit"])) {

    if (!isset($_SESSION["listaProductos"]) || empty($_SESSION["listaProductos"])) {
        $listaProductos             = array();
        $_SESSION["listaProductos"] = $listaProductos;
    }

    $listaProductos = $_SESSION["listaProductos"];

    if (!empty($_POST["selectProducto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["cantidad"])) {

        $listaDescripcion = "\n";
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
        echo "<h2>LLeno los campos vacios</h2>";

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
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Ejercicio 10</title>
  </head>

  <body>
    <div class="container">

      <h1>Ejercicio 10</h1>

      <form class="formularioVenta column" action="<?php $esteScript ?>" method="post">

        <div class="cabecera">

          <div class="column">
            <label class="marginY" for="selectProducto">Seleccione un producto:</label>
            <input class="marginY selectInput" list="productos" name="selectProducto" id="selectProducto"/>
            <datalist id="productos"></datalist>

          </div>

          <div class="column">
            <label class="marginY" for="descripcion">Descripcion:</label>
            <input class="marginY input" type="text" name="descripcion" id="descripcion">
          </div>


        </div>

        <div class="cuerpo">

          <div class="detalle">

            <div class="fieldPrecio">

              <div class="itemField">
                <label for="precio">Precio:</label>
                <br>
                <input class="inputField" type="text" id="precio" name="precio">
              </div>

              <div class="itemField">
                <label for="cantidad">Cantidad:</label>
                <br>
                <input class="inputField" type="text" id="cantidad" name="cantidad" value="1">
              </div>

              <div class="itemField">
                <label for="tipoCambio">Tipo de Cambio:</label>
                <br>
                <input class="inputField" type="email" id="tipoCambio" name="tipoCambio">
              </div>

            </div>

            <div class="textAreaContainer">
              <span>
                <label for="descripcion">Descripcion</label><br>
                <textarea name="descripcionTextArea" id="descripcion" cols="30" rows="15">

                <?php
if (isset($_POST["aceptarSubmit"])) {
    echo $listaDescripcion;
}
?>

                </textarea>
              </span>

              <span>
                <label for="precio">Precio</label><br>
                <textarea name="precioTextArea" id="precioTextArea" cols="20" rows="15">

                <?php
if (isset($_POST["aceptarSubmit"])) {
    echo $listaPrecios;
}
?>
                </textarea>
              </span>

              <span>
                <label for="cantidad">Cantidad</label><br>
                <textarea name="cantidadTextArea" id="cantidadTextArea" cols="20" rows="15">

                <?php
if (isset($_POST["aceptarSubmit"])) {
    echo $listaCantidad;
}
?>
                </textarea>
              </span>

              <span>
                <label for="subtotal">Subtotal</label><br>
                <textarea name="subtotal" id="subtotal" cols="20" rows="15">

                <?php
if (isset($_POST["aceptarSubmit"])) {
    echo $listaSubtotal;
}
?>

                </textarea>
              </span>

            </div>

            <div class="totalContainer">
              <label for="total">Total:&nbsp;</label>
              <input name="total" type="text" value="
              <?php
if (isset($_POST["aceptarSubmit"])) {
    echo $total;
}
?>
              ">
            </div>

          </div>


          <div class="botonesContainer">
            <button class="boton" type="submit" name="nuevo">Nuevo</button>
            <button class="boton" type="submit" name="aceptarSubmit">Aceptar</button>

            <button class="boton">Cancelar</button>
          </div>

        </div>

      </form>

    </div>




    <script src="./productos.js"></script>
  </body>

</html>
