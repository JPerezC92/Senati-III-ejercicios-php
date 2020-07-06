<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Costo con Descuento</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2>Costo con Descuento</h2>
  <form action=eje5.php class="form-horizontal" method="POST">
    <form class="form-horizontal" method="POST">
    <table  width='800' id='radio' class="table table-condensed table-striped">
        <tr>
            <td><div class="form-group">
                <label class="col-md-4 control-label" for="">Costo de refrigeradora:</label>  
                <div class="col-md-4">
                <input name="costoR" type="number" class="form-control input-md">
                </div>
                </div>
            </td>
        </tr>
        <tr>
            <td><div class="form-group">
                <label class="col-md-4 control-label" for="">Costo de televisor:</label>  
                <div class="col-md-4">
                <input name="costoT" type="number" class="form-control input-md">
                </div>
                </div>
            </td>
        </tr>
        <tr>
        <td><div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-8">
            <input name="enviar" type="submit" value="Enviar">
            <input name="reset" type="reset" value="Limpiar">
            
            </div>
            </div>
        </td>
    </tr>

        </table>
</body>
</html>