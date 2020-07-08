<?php

session_start();

$esteScript = basename(__FILE__);

if ('GET' === $_SERVER['REQUEST_METHOD']) {

    $listaAlumnosArray = array();

    $_SESSION["listaAlumnosArray"] = $listaAlumnosArray;

    $listaNro               = "\n";
    $listaAlumnosTextArea   = "\n";
    $listaNota01TextArea    = "\n";
    $listaNota02TextArea    = "\n";
    $listaNota03TextArea    = "\n";
    $listaPromedioTextArea  = "\n";
    $listaCondicionTextArea = "\n";

    $_SESSION["listaNro"]               = $listaNro;
    $_SESSION["listaAlumnosTextArea"]   = $listaAlumnosTextArea;
    $_SESSION["listaNota01TextArea"]    = $listaNota01TextArea;
    $_SESSION["listaNota02TextArea"]    = $listaNota02TextArea;
    $_SESSION["listaNota03TextArea"]    = $listaNota03TextArea;
    $_SESSION["listaPromedioTextArea"]  = $listaPromedioTextArea;
    $_SESSION["listaCondicionTextArea"] = $listaCondicionTextArea;

    // $promediosEnMemoria = false;

} elseif (isset($_POST["agregar"])) {

    if (!isset($_SESSION["listaAlumnosArray"]) || empty($_SESSION["listaAlumnosArray"])) {
        $listaAlumnosArray             = array();
        $_SESSION["listaAlumnosArray"] = $listaAlumnosArray;
    }

    $listaAlumnosArray = $_SESSION["listaAlumnosArray"];

    if (!empty($_POST["nombreAlumno"]) && !empty($_POST["nota1"]) && !empty($_POST["nota2"]) && !empty($_POST["nota3"])) {

        $listaNro             = "\n";
        $listaAlumnosTextArea = "\n";
        $listaNota01TextArea  = "\n";
        $listaNota02TextArea  = "\n";
        $listaNota03TextArea  = "\n";

        if (isset($_SESSION["listaPromedioTextArea"])) {
            $listaPromedioTextArea  = $_SESSION["listaPromedioTextArea"];
            $listaCondicionTextArea = $_SESSION["listaCondicionTextArea"];
        } else {
            $listaPromedioTextArea  = "\n";
            $listaCondicionTextArea = "\n";
        }

        $nuevoAlumno = array(
            "nombreAlumno" => $_POST["nombreAlumno"],
            "nota1"        => $_POST["nota1"],
            "nota2"        => $_POST["nota2"],
            "nota3"        => $_POST["nota3"],
        );

        array_push($listaAlumnosArray, $nuevoAlumno);

        $_SESSION["listaAlumnosArray"] = $listaAlumnosArray;

        echo "Contando alumnos" . count($listaAlumnosArray);

        for ($i = 0; $i < count($listaAlumnosArray); $i++) {

            $nombreAlumno = $listaAlumnosArray[$i]["nombreAlumno"];
            $nota1        = $listaAlumnosArray[$i]["nota1"];
            $nota2        = $listaAlumnosArray[$i]["nota2"];
            $nota3        = $listaAlumnosArray[$i]["nota3"];

            $listaNro .= ($i + 1) . "\n";
            $listaAlumnosTextArea .= "$nombreAlumno\n";
            $listaNota01TextArea .= "$nota1\n";
            $listaNota02TextArea .= "$nota2\n";
            $listaNota03TextArea .= "$nota3\n";

        }

        $_SESSION["listaNro"]             = $listaNro;
        $_SESSION["listaAlumnosTextArea"] = $listaAlumnosTextArea;
        $_SESSION["listaNota01TextArea"]  = $listaNota01TextArea;
        $_SESSION["listaNota02TextArea"]  = $listaNota02TextArea;
        $_SESSION["listaNota03TextArea"]  = $listaNota03TextArea;

    } else {
        echo "<h2>LLene los campos vacios</h2>";
        $listaAlumnosTextArea = $_SESSION["listaAlumnosTextArea"];
        $listaNota01TextArea  = $_SESSION["listaNota01TextArea"];
        $listaNota02TextArea  = $_SESSION["listaNota02TextArea"];
        $listaNota03TextArea  = $_SESSION["listaNota03TextArea"];

    }

} elseif (isset($_POST["calcularPromedio"])) {

    $listaNro                 = "\n";
    $listaPromedioTextArea    = "\n";
    $listaCondicionTextArea   = "\n";
    $totalAlumnosAprobados    = 0;
    $totalAlumnosDesaprobados = 0;

    $listaAlumnosArray = $_SESSION["listaAlumnosArray"];
    $totalAlumnos      = count($listaAlumnosArray);

    $listaNro             = $_SESSION["listaNro"];
    $listaAlumnosTextArea = $_SESSION["listaAlumnosTextArea"];
    $listaNota01TextArea  = $_SESSION["listaNota01TextArea"];
    $listaNota02TextArea  = $_SESSION["listaNota02TextArea"];
    $listaNota03TextArea  = $_SESSION["listaNota03TextArea"];

    for ($i = 0; $i < count($listaAlumnosArray); $i++) {

        $nota1 = $listaAlumnosArray[$i]["nota1"];
        $nota2 = $listaAlumnosArray[$i]["nota2"];
        $nota3 = $listaAlumnosArray[$i]["nota3"];

        $promedio = ($nota1 + $nota2 + $nota3) / 3;

        $listaPromedioTextArea .= "$promedio\n";

        if ($promedio > 10) {

            $totalAlumnosAprobados += 1;
            $listaCondicionTextArea .= "Aprobado\n";
        } else {
            $listaCondicionTextArea .= "Desaprobado\n";
            $totalAlumnosDesaprobados += 1;

        }

        $_SESSION["listaPromedioTextArea"]  = $listaPromedioTextArea;
        $_SESSION["listaCondicionTextArea"] = $listaCondicionTextArea;

        // $promediosEnMemoria = true;

    }

} elseif (isset($_POST["nuevo"])) {

    $listaNro                 = null;
    $listaAlumnosTextArea     = null;
    $listaNota01TextArea      = null;
    $listaNota02TextArea      = null;
    $listaNota03TextArea      = null;
    $listaPromedioTextArea    = null;
    $listaCondicionTextArea   = null;
    $totalAlumnos             = null;
    $totalAlumnosAprobados    = null;
    $totalAlumnosDesaprobados = null;

    $_SESSION["listaNro"]             = $listaNro;
    $_SESSION["listaAlumnosTextArea"] = $listaAlumnosTextArea;
    $_SESSION["listaNota01TextArea"]  = $listaNota01TextArea;
    $_SESSION["listaNota02TextArea"]  = $listaNota02TextArea;
    $_SESSION["listaNota03TextArea"]  = $listaNota03TextArea;
    $_SESSION["listaNota03TextArea"]  = $listaPromedioTextArea;
    $_SESSION["listaNota03TextArea"]  = $listaCondicionTextArea;

    $listaAlumnosArray             = array();
    $_SESSION["listaAlumnosArray"] = $listaAlumnosArray;

} elseif (isset($_POST["salir"]) || isset($_POST["botonPrincipal"])) {

    header('Location: /index.php');
    exit;
} elseif (isset($_POST["botonAtras"])) {

    header('Location: /ejercicio08/index.php');
    exit;
} elseif (isset($_POST["botonAdelante"])) {

    header('Location: /ejercicio10/index.php');
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


          <div class="w-full h-full flex-col items-center" action="<?php $esteScript ?>" method="post">

          <h3 class="text-center">Datos del alumno:</h3>
            <form method="POST">
            <div class="flex flex-wrap mx-3 mb-2">



              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">



              <div class="flex mt-2 items-center">

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-city">
                  Alumno:&nbsp;
                </label>
                <input class="appearance-none block bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="nombreAlumno" id="nombreAlumno">
              </div>
              <div class="flex mt-2 items-center">

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-city">
                  Nota 1:&nbsp;
                </label>
                <input class="w-16 appearance-none block bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="nota1" id="nota1">
              </div>
              <div class="flex mt-2 items-center">

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-city">
                  Nota 2:&nbsp;
                </label>
                <input class="w-16 appearance-none block bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="nota2" id="nota2">
              </div>
              <div class="flex mt-2 items-center">

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-city">
                  Nota 3:&nbsp;
                </label>
                <input class="w-16 appearance-none block bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="nota3" id="nota3">
              </div>


            </div>

              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 flex flex-col justify-center">
              <button
                          class="w-24 bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded" type="submit" id="agregar" name="agregar">
                          Agregar
                  </button>
              </div>

              </form>

            </div>










            <div class="flex flex-wrap mx-3 mb-2 mt-8">

              <!-- textarea -->
              <div class="flex w-full md:w-full px-3 mb-6 md:mb-0 items-center">

                <div class="flex flex-wrap mx-3 mb-2">


                  <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      N°
                    </label>


                              <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {

    echo "<textarea name='listaNro' id='listaNro'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaNro . "</textarea>";
}
?>


                  </div>
                  <div class="w-full md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Nombre
                    </label>


                              <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {

    echo "<textarea name='nombreTextArea' id='nombreTextArea'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaAlumnosTextArea . "</textarea>";
}
?>


                  </div>


                  <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Nota 1
                    </label>


                              <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {
    echo "<textarea name='nota1TextArea' id='nota1TextArea'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaNota01TextArea . "</textarea>";
}
?>

                  </div>


                  <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    Nota 2
                    </label>

                              <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {
    echo "<textarea name='nota2TextArea' id='nota2TextArea' class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaNota02TextArea . "</textarea>";
}
?>

                  </div>


                  <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Nota 3
                    </label>


                    <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {

    echo "<textarea name='nota3TextArea' id='nota3TextArea'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaNota03TextArea . "</textarea>";
}
?>


                  </div>


                  <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Promedio
                    </label>


                    <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {

    echo "<textarea name='promedioTextArea' id='promedioTextArea'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaPromedioTextArea . "</textarea>";
}
?>


                  </div>


                  <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                      Condicion
                    </label>


                    <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"]) || 'GET' === $_SERVER['REQUEST_METHOD']) {

    echo "<textarea name='condicionTextArea' id='condicionTextArea'
    class='resize-y h-32 w-full border rounded focus:outline-none focus:shadow-outline'>" . $listaCondicionTextArea . "</textarea>";
}
?>


                  </div>




                </div>


              </div>
              <!-- boton -->


            </div>



            <form action="" method="post">
            <div class="flex flex-wrap mx-3 mb-2 mt-8">



<div class="flex flex-col w-full md:w-1/2 px-3 mb-6 md:mb-0 items-center">

  <div class="flex flex-wrap mx-3 mb-2 text-center">

    <div class="w-full md:h-1/3 px-3 m-2 md:mb-0 flex justify-end items-center">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-0" for="grid-city">
        Total:&nbsp;
      </label>
      <input class="appearance-none block w-24 bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
      type="text" id="totalAlumnosInput" name="totalAlumnosInput"
      <?php
if (isset($_POST["calcularPromedio"])) {
    echo "value=$totalAlumnos";
}
?>
      >
    </div>
    <div class="w-full md:h-1/3 px-3 m-2 md:mb-0 flex justify-end items-center">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-0" for="grid-city">
        Aprobados:&nbsp;
      </label>
      <input class="appearance-none block w-24 bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
      type="text" id="totalAlumnosAprobadosInput" name="totalAlumnosAprobadosInput"
      <?php
if (isset($_POST["calcularPromedio"])) {
    echo "value=$totalAlumnosAprobados";
}
?>
>


    </div>
    <div class="w-full md:h-1/3 px-3 m-2 md:mb-0 flex justify-end items-center">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-0" for="grid-city">
        Desaprobados:&nbsp;
      </label>
      <input class="appearance-none block w-24 bg-white text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
      type="text" id="totalAlumnosDesaprobadosInput" name="totalAlumnosDesaprobadosInput"

      <?php
if (isset($_POST["calcularPromedio"])) {
    echo "value=$totalAlumnosDesaprobados";
}
?>
      >
    </div>





  </div>

</div>

<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">

<div class="flex flex-col mx-3 mb-2 ">


  <button
  class="bg-red-500 hover:bg-red-700 text-white font-bold m-2 py-2 px-4 border border-red-700 rounded w-32" type="submit" id="salir" name="salir">
      Salir
    </button>
    <button
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded w-32" type="submit" id="calcularPromedio" name="calcularPromedio">
    Calcular Promedio
    </button>
    <button
    class="bg-orange-500 hover:bg-orange-700 text-white font-bold m-2 py-2 px-4 border border-orange-700 rounded w-32" type="reset" id="nuevo" name="nuevo">
      Nuevo
    </button>


  </div>

</div>

</div>

<div class="flex flex-wrap mx-3 mt-4 mb-2 items-center justify-center">


  <button
  class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded" name="botonAtras" id="botonAtras">
  << </button>
  <button
                          class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded" name="botonPrincipal" id="botonPrincipal">
                    Ir seccion principal
                  </button>
                  <button
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-2 py-2 px-4 border border-blue-700 rounded" name="botonAdelante">
                  >>
                </button>

              </div>

<!-- ex form -->
</div>
</form>

        </div>

      </div>
    </section>


    <script src="./productos.js"></script>
  </body>

  </html>
