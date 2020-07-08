<?php
    $Nombre= "";
    $Precio=0;
    $Cantidad=0;
    $Total=0;
    $Valor=0;
    $IGV=0;
    $Total2=0;
    $Tipo=0;
    $Fecha="";
    if(isset($_POST["aceptar"])){
        $este_script = basename(__FILE__);
        $Cantidad=$_POST['cantidad'];
        $Tipo=$_POST['tipo'];
        $Nombre=$_POST['nombre'];
        $Fecha= $_POST['fecha'];
        if ($Tipo == 'a'){
            $Precio= 12;
        }elseif($Tipo == 'b'){
            $Precio= 10 ;
        }elseif($Tipo == 'c'){
            $Precio= 8 ;
        }else{
            $Precio =  5 ;
        }
        $Total= $Precio * $Cantidad;
        $Valor = $Total;
        $IGV= $Valor * 0.18;
        $Total2= $Total + $IGV;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GRIFOS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <h1><b>Grifos YPF</b></h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="form-horizontal" >
    <table id='calificaciones' class="table table-condensed table-striped">
    <tr>
        <td colspan='2'>
            <div class="form-group">
            <label class="col-md-4 control-label" for="">Documento</label>  
            <div class="col-md-7">
            <select name="tipo" class="form-control">
            <option value="a">Boleta</option>
            <option value="b">Factura</option>
    </select>
            </div>
            </div>
        </td>
        <td colspan='2'>
            <div class="form-group">
            <label class="col-md-4 control-label" for="">Fecha</label>  
            <div class="col-md-7">
            <input name="fecha" type="date" placeholder="" class="form-control input-md" value='<?php echo $Fecha?>'>
            </div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan='3' width='25'>
            <div class="form-group">
            <label class="col-md-4 control-label" for="">Nombre</label>  
            <div class="col-md-7">
            <input name="nombre" type="text" placeholder="Nombre" class="form-control input-md" value='<?php echo $Nombre?>'>
            </div>
            </div>
        </td><td></td>
    </tr>
    <tr>
        <td width='485'>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">Tipo de Combustible</label></div>
        </td>
        <td>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">Precio</label></div>
        </td>
        <td>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">Cantidad</label></div>
        </td>
        <td>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">Total</label></div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="col-md-7">
            <select name="tipo" class="form-control">
            <option value="a">Gasolina 80</option>
            <option value="b">Gasolina 69</option>
            <option value="c">Diesel 2</option>
            <option value="d">Kerosene</option>
    </select>
            </div>
        </td width='150'>
        <td>
        <div class="col-md-6">
            <input name="N_precio" type="number"class="form-control input-md" value='<?php echo $Precio?>'>
            </div>
        </td width='150'>
        <td>
        <div class="col-md-6">
            <input name="cantidad" type="number"class="form-control input-md" value='<?php echo $Cantidad?>'>
            </div>
        </td>
        <td>
        <div class="col-md-6">
            <input name="N_total" type="number"class="form-control input-md" value='<?php echo $Total?>'>
            </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
        <div class="form-group">
            <label class="col-md-5 control-label" for="">Valor de Venta</label></div>
        </td>
        <td>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">IGV</label></div>
        </td>
        <td>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">Total</label></div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
        <div class="col-md-6">
            <input name="N_valor" type="number"class="form-control input-md" value='<?php echo $Valor?>'>
            </div>
        </td>
        <td>
        <div class="col-md-6">
            <input name="N_igv" type="number"class="form-control input-md" value='<?php echo $IGV?>'>
            </div>
        </td>
        <td>
        <div class="col-md-6">
            <input name="N_total" type="number"class="form-control input-md" value='<?php echo $Total2?>'>
            </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><br>
            <button name="aceptar" class="btn btn-success"><b>Aceptar</b></button>
        </td>
        <td><br>
            <button type='reset' id="limpiar" name="limpiar" class="btn btn-danger"><b>Salir</b></button>
        </td>
    </tr>
    </table>
</body>
</html>