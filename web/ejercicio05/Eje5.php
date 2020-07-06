<?php
$precio1=$_POST["costoR"];
$precio2=$_POST["costoT"];
$precio3=$precio1*0.11 + $precio1;
$precio4=$precio2*0.15+ $precio2;


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>COSTOS SIN DESCUENTOS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <tr><td><h2>Costo sin Descuento</h2></td></tr>
    <tr>
            <td><div class="form-group">
                <label class="col-md-4 control-label" for="">Costo de refrigeradora: <?php echo" ".$precio3?></label>  
                </div>
                </div>
            </td>
        </tr>
        <tr>
            <td><div class="form-group">
                <label class="col-md-4 control-label" for="">Costo de televisor: <?php echo " ".$precio4?></label>                
                </div>
                </div>
            </td>
        </tr>
        </body>
</html>