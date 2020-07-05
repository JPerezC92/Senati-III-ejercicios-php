<?php
  $Radio=0;
  $esfera=0;
  $esfera1=0;
  $Radio1=0;
  if(isset($_POST["calcular"])){
    $este_script = basename(__FILE__);
    $Radio=$_POST['radio'];
    $Radio1= $Radio + 3;
    $esfera= round(((4/3)* 3.14 * ($Radio * $Radio * $Radio)),2);
    $esfera1=round(((4/3)* 3.14 * ($Radio * $Radio * $Radio)),2);
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RADIO</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="form-horizontal" >
<table  width='800' id='radio' class="table table-condensed table-striped">
<tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">INGRESE RADIO:</label>  
  <div class="col-md-4">
  <input name="radio" type="number" class="form-control input-md" value='<?php echo $Radio?>'>
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
  <label class="col-md-4 control-label" for="">VOLUMEN ESFERA 1:</label>  
  <div class="col-md-4">
  <input name="" type="number" class="form-control input-md" value='<?php echo $esfera?>'>
  </div>
</div></td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">VOLUMEN ESFERA 2:</label>  
  <div class="col-md-4">
  <input name="" type="number" class="form-control input-md" value='<?php echo $esfera1?>'>
  </div>
</div></td>
    </tr>
    </table>
</body>
</html>