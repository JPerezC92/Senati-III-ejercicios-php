<?php
  $Radio=0;
  $Reducion=0;
  $Reducion2=0;
  if(isset($_POST["calcular"])){
    $este_script = basename(__FILE__);
    $Radio=$_POST['radio'];
    $Reducion= $Radio * 0.50;
    $Reducion2= $Radio * 0.25;  
  }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RADIO2</title>
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
  <label class="col-md-4 control-label" for="">CUANDO SE REDUCE UN 50%:</label>  
  <div class="col-md-4">
  <input name="reducion" type="number" class="form-control input-md" value='<?php echo $Reducion?>'>
  </div>
</div></td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">CUANDO SE REDUCE UN 25%:</label>  
  <div class="col-md-4">
  <input name="reducion2" type="number" class="form-control input-md" value='<?php echo $Reducion2?>'>
  </div>
</div></td>
    </tr>
    </table>
</body>
</html>