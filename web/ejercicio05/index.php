
<?php
$este_script = basename(__FILE__);
$cadena = '';
$cadena1='';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

    $cadena ='<p>';
    $cadena.= <<< MARCA_FINAL
    <head>
    <meta charset="utf-8">
    <title>COSTOS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
    <h2>Costo con Descuento</h2>
    <form action='$este_script' class="form-horizontal" method="POST">
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
MARCA_FINAL;
}

else{
    $precio1=$_POST["costoR"];
    $precio2=$_POST["costoT"];
    $precio3=$precio1*0.11 + $precio1;
    $precio4=$precio2*0.15+ $precio2;
    $cadena1.= <<< MARCA_FINAL
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <table  width='800' id='radio' class="table table-condensed table-striped">
    <tr>
    <tr><td><h2>Costo sin Descuento</h2></td></tr>
            <td><div class="form-group">
                <label class="col-md-4 control-label" for="">Costo de refrigeradora:</label>  
                <div class="col-md-4">
                <input name="" type="number" class= "form-control input-md" value="$precio3">
                </div>
                </div>
            </td>
        </tr>
        <tr>
            <td><div class="form-group">
                <label class="col-md-4 control-label" for="">Costo de televisor:</label>  
                <div class="col-md-4">
                <input name="" type="number" class= "form-control input-md" value="$precio4">
                </div>
                </div>
            </td>
        </tr>
    
MARCA_FINAL;
}
echo <<< MARCA_FINAL
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<HTML>
<HEAD>
  <TITLE>Login</TITLE>
</HEAD>
<BODY>
  $cadena
  $cadena1
</BODY>
</HTML>
MARCA_FINAL;

?>
