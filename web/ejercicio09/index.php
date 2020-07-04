<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Datos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

    <fieldset>
    <legend><h3>Datos del alumno</h3></legend>

    <form class="form-horizontal" method="POST">

    <table id='calificaciones' class="table table-condensed table-striped">
    <tr>
        <td>
        <div class="form-group">
            <label class="col-md-2 control-label" for=""><b>Alumno</b></label>
            <div class="col-md-4">
            <input name="N_alumno" type="text"class="form-control input-md">
            </div></div>
        </td>
        <td rowspan='4'>
            <br><br><br><br><button id="" name="agregar" class="btn btn-success"><h3><b>Agregar</b></h3></button>
        </td>
    </tr>
    <tr>
        <td>
        <div class="form-group">
            <label class="col-md-2 control-label" for=""><b>Nota1:</b></label>
            <div class="col-md-2">
            <input name="N_nota1" type="number"class="form-control input-md">
            </div></div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="form-group">
            <label class="col-md-2 control-label" for=""><b>Nota2:</b></label>
            <div class="col-md-2">
            <input name="N_nota2" type="number"class="form-control input-md">
            </div></div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="form-group">
            <label class="col-md-2 control-label" for=""><b>Nota3:</b></label>
            <div class="col-md-2">
            <input name="N_nota3" type="number"class="form-control input-md">
            </div></div>
        </td>
    </tr>
    </form>




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
                    <textarea class="form-control" id="" name=""></textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-9">
                    <textarea class="form-control" id="" name=""></textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                    <textarea class="form-control" id="" name=""></textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                    <textarea class="form-control" id="" name=""></textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                    <textarea class="form-control" id="" name=""></textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                    <textarea class="form-control" id="" name=""></textarea>
                    </div>
                </td>
                <td>
                    <div class="col-md-9">
                    <textarea class="form-control" id="" name=""></textarea>
                    </div>
                </td>
            </tr>
        </form>
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
                    <input name="N_total" type="number"class="form-control input-md">
                    </div></div>
                </td>
                <td rowspan='2'>
                    <button id="" name="salir" class="btn btn-danger"><h4><b>Salir</b></h4></button>
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
                    <input name="N_total" type="number"class="form-control input-md">
                    </div></div>
                </td>
                <td rowspan='2'>
                    <button id="" name="calcular" class="btn btn-warning"><h4><b>Calcular<br>Promedio</b></h4></button>
                </td>
                <td rowspan='2'>
                    <button id="" name="nuevo" class="btn btn-info"><h4><b>Nuevo</b></h4></button>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for=""><b>Desaprobados:</b></label>
                    <div class="col-md-2">
                    <input name="N_total" type="number"class="form-control input-md">
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
