<?php
  $Valor1=0;
  $Valor2=0;
  $Valor3=0;
  $Valor4=0;
  $Producto=0;
  $Suma=0;
  $Media=0;
  if(isset($_POST["calcular"])){
    $este_script = basename(__FILE__);
    $Valor1=$_POST['valor1'];
    $Valor2=$_POST['valor2'];
    $Valor3=$_POST['valor3'];
    $Valor4=$_POST['valor4'];
    $Producto= ($Valor1*$Valor2*$Valor3*$Valor4);
    $Suma= ($Valor1+$Valor2+$Valor3+$Valor4);
    $Media= (($Valor1+$Valor2+$Valor3+$Valor4)/4);
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>VALOR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body><br><br>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="form-horizontal" >
<table  width='800' id='valor' class="table table-condensed table-striped">
<tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">INGRESE VALOR 1:</label>  
  <div class="col-md-4">
  <input name="valor1" type="number" class="form-control input-md" value='<?php echo $Valor1?>'>
  </div>
</div></td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">INGRESE VALOR 2:</label>  
  <div class="col-md-4">
  <input name="valor2" type="number" class="form-control input-md" value='<?php echo $Valor2?>'>
  </div>
</div></td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">INGRESE VALOR 3:</label>  
  <div class="col-md-4">
  <input name="valor3" type="number" class="form-control input-md" value='<?php echo $Valor3?>'>
  </div>
</div></td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">INGRESE VALOR 4:</label>  
  <div class="col-md-4">
  <input name="valor4" type="number" class="form-control input-md" value='<?php echo $Valor4?>'>
  </div>
</div></td>
    </tr>
    <tr>
        <td>
        <div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-8">
    <button id="" name="calcular" class="btn btn-success">CALCULAR</button>
    <button id="" name="limpiar" class="btn btn-danger">LIMPIAR</button>
  </div>
</div>
        </td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">PRODUCTO:</label>  
  <div class="col-md-4">
  <input name="" type="number" class="form-control input-md" value='<?php echo $Producto?>'>
  </div>
</div></td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">SUMA:</label>  
  <div class="col-md-4">
  <input name="" type="number" class="form-control input-md" value='<?php echo $Suma?>'>
  </div>
</div></td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">MEDIA ARITMETICA:</label>  
  <div class="col-md-4">
  <input name="" type="number" class="form-control input-md" value='<?php echo $Media?>'>
  </div>
</div></td>
    </tr>
    </table>
</body>
</html>