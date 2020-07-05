<?php
  $Curso="";
  $Condicion="";
  $Final=0;
  $Practica=0;
  $Parcial=0;
  $Promedio=0;
  $Nombre="";
  if(isset($_POST["calcular"])){
    $este_script = basename(__FILE__);
    $Practica=$_POST['practica'];
    $Parcial=$_POST['parcial'];
    $Final=$_POST['final'];
    $Nombre=$_POST['nombre'];
    $Curso = $_POST['tipo'];
    $Condicion ='';
    $Promedio= $_POST['promedio'];
    if($Curso=="a"){
      $Promedio= round(($Practica + $Parcial + $Final)/3,2);
      if($Promedio > 10){
        $Condicion= 'Aprobado';  
      }
      else{
        $Condicion= 'Desaprobado';
      }
    }elseif($Curso=="b"){
      $Promedio= round((2* $Practica + $Parcial + 3* $Final)/6,2);
      if($Promedio > 10){
        $Condicion= 'Aprobado';  
      }
      else{
        $Condicion= 'Desaprobado';
      }
    }elseif($Curso=="c"){
      $Promedio= round(($Practica + 3 * $Parcial + $Final)/5,2);
      if($Promedio > 10){
        $Condicion= 'Aprobado';  
      }
      else{
        $Condicion= 'Desaprobado';
      }
    }elseif($Curso=="d"){
      $Promedio= round(($Practica + 2* $Parcial + 3 * $Final)/6,2);
      if($Promedio > 10){
        $Condicion= 'Aprobado';  
      }
      else{
        $Condicion= 'Desaprobado';
      }
    }
  }
  
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>CALIFICACION</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
  <h2>Calificaciones</h2>
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="form-horizontal" >
  <table  width='800' id='calificaciones' class="table table-condensed table-striped">
    <br>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">Nombre</label>  
  <div class="col-md-4">
  <input name="nombre" type="text" placeholder="Nombre" class="form-control input-md"  value='<?php echo $Nombre?>'>
  </div>
</div></td><td></td>
    </tr>
    <tr>
      <td><div class="form-group">
  <label class="col-md-4 control-label" for="">Curso</label>
  <div class="col-md-4">
    <select name="tipo" class="form-control">
      <option value="a">JCreator</option>
      <option value="b">Netbeans</option>
      <option value="c">VBNet</option>
      <option value="d">Eclipse</option>
    </select>
  </div>
</div></td>
    </tr>
    <tr>
      <td><div class="form-group">
      <label class="col-md-4 control-label" for="">Practica:</label>  
      <div class="col-md-2">
      <input id="" name="practica" type="number" placeholder="" class="form-control input-md" value='<?php echo $Practica?>'>
      </div>
      </div>
      </td>

      <td>
      <div class="form-group">
      <label class="col-md-4 control-label" for="">Promedio:</label>  
      <div class="col-md-2">
      <input id="" name="promedio" type="number" placeholder="" value='<?php echo $Promedio?>' class="form-control input-md" value='<?php echo $Promedio?>'>
      </div>
      </div>
      </td>
    </tr>

    <tr>
      <td><div class="form-group">
      <label class="col-md-4 control-label" for="">Parcial:</label>  
      <div class="col-md-2">
      <input id="" name="parcial" type="number" placeholder="" class="form-control input-md" value='<?php echo $Parcial?>'> 
      </div>
      </div>
      </td>

      <td><div class="form-group">
      <label class="col-md-4 control-label" for="">Condición:</label>  
      <div class="col-md-3">
      <input id="" name="condicion" type="text" placeholder="" class="form-control input-md" value='<?php echo $Condicion?>'> 
      </div>
      </div>
      </td>
    </tr>

    <tr>
      <td>
      <div class="form-group">
      <label class="col-md-4 control-label" for="">Final:</label>  
      <div class="col-md-2">
      <input id="" name="final" type="number" placeholder="" class="form-control input-md" value='<?php echo $Final?>'> 
      </div>
      </div>

      </td>
      <td><button id="calcular" name="calcular" class="btn btn-success">Calcular</button>
    <button type='reset' id="limpiar" name="limpiar" class="btn btn-danger">Limpiar</button></td>
    </tr>
</table>
  </form>
</body>
</html>