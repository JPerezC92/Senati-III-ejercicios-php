<?php

session_start();

$esteScript = basename(__FILE__);

if ('GET' === $_SERVER['REQUEST_METHOD']) {

    $listaAlumnosArray = array();

    $_SESSION["listaAlumnosArray"] = $listaAlumnosArray;

    $listaAlumnosTextArea   = "\n";
    $listaNota01TextArea    = "\n";
    $listaNota02TextArea    = "\n";
    $listaNota03TextArea    = "\n";
    $listaPromedioTextArea  = "\n";
    $listaCondicionTextArea = "\n";

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

            $listaAlumnosTextArea .= "$nombreAlumno\n";
            $listaNota01TextArea .= "$nota1\n";
            $listaNota02TextArea .= "$nota2\n";
            $listaNota03TextArea .= "$nota3\n";

        }

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

    $listaPromedioTextArea    = "\n";
    $listaCondicionTextArea   = "\n";
    $totalAlumnosAprobados    = 0;
    $totalAlumnosDesaprobados = 0;

    $listaAlumnosArray = $_SESSION["listaAlumnosArray"];
    $totalAlumnos      = count($listaAlumnosArray);

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

    $listaAlumnosTextArea     = null;
    $listaNota01TextArea      = null;
    $listaNota02TextArea      = null;
    $listaNota03TextArea      = null;
    $listaPromedioTextArea    = null;
    $listaCondicionTextArea   = null;
    $totalAlumnos             = null;
    $totalAlumnosAprobados    = null;
    $totalAlumnosDesaprobados = null;

    $_SESSION["listaAlumnosTextArea"] = $listaAlumnosTextArea;
    $_SESSION["listaNota01TextArea"]  = $listaNota01TextArea;
    $_SESSION["listaNota02TextArea"]  = $listaNota02TextArea;
    $_SESSION["listaNota03TextArea"]  = $listaNota03TextArea;
    $_SESSION["listaNota03TextArea"]  = $listaPromedioTextArea;
    $_SESSION["listaNota03TextArea"]  = $listaCondicionTextArea;

    $listaAlumnosArray             = array();
    $_SESSION["listaAlumnosArray"] = $listaAlumnosArray;

} elseif (isset($_POST["salir"])) {
    header('Location: ../index.php');
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Ejercicio 09</title>
</head>
<body>

    <fieldset>
    <legend><h3>Datos del alumno</h3></legend>

    <form class="form-horizontal" action="<?php $esteScript ?>" method="POST">

    <table id='calificaciones' class="table table-condensed table-striped">
    <tr>
        <td>
        <div class="form-group">
            <label class="col-md-2 control-label" for=""><b>Alumno</b></label>
            <div class="col-md-4">
            <input name="nombreAlumno" type="text"class="form-control input-md">
            </div></div>
        </td>
        <td rowspan='4'>

            <br><br><br><br><button type="submit" id="agregar" name="agregar" class="btn btn-success"><h3><b>Agregar</b></h3></button>

        </td>
    </tr>
    <tr>
        <td>
        <div class="form-group">
            <label class="col-md-2 control-label" for=""><b>Nota1:</b></label>
            <div class="col-md-2">
            <input name="nota1" id="nota1" type="number"class="form-control input-md" min="0" max="20">
            </div></div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="form-group">
            <label class="col-md-2 control-label" for=""><b>Nota2:</b></label>
            <div class="col-md-2">
            <input name="nota2" id="nota2" type="number"class="form-control input-md" min="0" max="20">
            </div></div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="form-group">
            <label class="col-md-2 control-label" for=""><b>Nota3:</b></label>
            <div class="col-md-2">
            <input name="nota3" id="nota3" type="number"class="form-control input-md" min="0" max="20">
            </div></div>
        </td>
    </tr>
    </form>


    <!-- fin form 1 -->



    </table>
    <fieldset>
    <fieldset>
        <legend><h3>Ingreso de Notas</h3></legend>


        <form class="form-horizontal" method="POST">
        <table id='ingresodenotas' class="table table-condensed table-striped">
            <tr>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>N°</b></label></div>
                </td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Alumno:</b></label></div></td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Nota1:</b></label></div>
                </td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Nota2:</b></label></div>
                </td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Nota3:</b></label></div>
                </td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Promedio:</b></label></div>
                </td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Condicion:</b></label></div>
                </td>
            </tr>


            <tr>
                <td>
                    <div class="col-md-4">
                    <textarea class="form-control" id="numeroOrden" name="numeroOrden">



                    </textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-9">
                    <textarea class="form-control" id="nombreTextArea" name="nombreTextArea">

                    <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"])) {
    echo $listaAlumnosTextArea;
}
?>

                    </textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                    <textarea class="form-control" id="nota1TextArea" name="nota1TextArea">

                    <?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"])) {
    echo $listaNota01TextArea;
}
?>

                    </textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                    <textarea class="form-control" id="nota2TextArea" name="nota2TextArea">

<?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"])) {
    echo $listaNota02TextArea;
}
?>

                    </textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                    <textarea class="form-control" id="nota3TextArea" name="nota3TextArea">

<?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"])) {
    echo $listaNota03TextArea;
}
?>

                    </textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                    <textarea class="form-control" id="promedioTextArea" name="promedioTextArea">

<?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"])) {
    echo $listaPromedioTextArea;
}
?>

                    </textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-9">
                    <textarea class="form-control" id="condicionTextArea" name="condicionTextArea">

<?php
if (isset($_POST["agregar"]) || isset($_POST["calcularPromedio"])) {
    echo $listaCondicionTextArea;
}
?>

                    </textarea>
                    </div>
                </td>
            </tr>
        </form>

<!-- fin form 1 -->

        </table>
    </fieldest>
        <form class="form-horizontal" method="POST">
        <table id='respuesta' class="table table-condensed table-striped">
            <tr>
                <td>
                </td><br><br>
                <td rowspan='2'>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Total:</b></label>
                    <div class="col-md-2">
                    <input name="totalAlumnosInput" type="number"class="form-control input-md"
                    <?php
if (isset($_POST["calcularPromedio"])) {
    echo "value=$totalAlumnos";
}
?>                    >
                    </div></div>
                </td>
                <td rowspan='2'>
                    <button id="salir" name="salir" class="btn btn-danger"><h4><b>Salir</b></h4></button>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Aprobados:</b></label>
                    <div class="col-md-2">
                    <input name="totalAlumnosAprobadosInput" type="number"class="form-control input-md"
                    <?php
if (isset($_POST["calcularPromedio"])) {
    echo "value=$totalAlumnosAprobados";
}
?>                    >
                    </div></div>
                </td>
                <td rowspan='2'>
                    <button id="calcularPromedio" name="calcularPromedio" class="btn btn-warning"><h4><b>Calcular<br>Promedio</b></h4></button>
                </td>
                <td rowspan='2'>
                    <button id="nuevo" name="nuevo" class="btn btn-info"><h4><b>Nuevo</b></h4></button>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Desaprobados:</b></label>
                    <div class="col-md-2">
                    <input name="totalAlumnosDesaprobadosInput" type="number"class="form-control input-md"                     <?php
if (isset($_POST["calcularPromedio"])) {
    echo "value=$totalAlumnosDesaprobados";
}
?>                    >
                    </div></div>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
        </table>
        </form>





</body>
</html>
