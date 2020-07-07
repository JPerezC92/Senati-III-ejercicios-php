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
    <form class="form-horizontal" method="POST">
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
            <input name="N_fecha" type="date" placeholder="" class="form-control input-md">
            </div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan='3' width='25'>
            <div class="form-group">
            <label class="col-md-4 control-label" for="">Nombre</label>  
            <div class="col-md-7">
            <input name="N_nombre" type="text" placeholder="Nombre" class="form-control input-md">
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
            <input name="N_precio" type="number"class="form-control input-md">
            </div>
        </td width='150'>
        <td>
        <div class="col-md-6">
            <input name="N_cantidad" type="number"class="form-control input-md">
            </div>
        </td>
        <td>
        <div class="col-md-6">
            <input name="N_total" type="number"class="form-control input-md">
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
            <input name="N_valor" type="number"class="form-control input-md">
            </div>
        </td>
        <td>
        <div class="col-md-6">
            <input name="N_igv" type="number"class="form-control input-md">
            </div>
        </td>
        <td>
        <div class="col-md-6">
            <input name="N_total" type="number"class="form-control input-md">
            </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><br>
            <button id="calcular" name="calcular" class="btn btn-success"><b>Aceptar</b></button>
        </td>
        <td><br>
            <button type='reset' id="limpiar" name="limpiar" class="btn btn-danger"><b>Salir</b></button>
        </td>
    </tr>
    </table>
</body>
</html>