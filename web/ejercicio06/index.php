<?php
$este_script = basename(__FILE__);
$cadena = '';
$cadena1='';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

    $cadena ='<p>';
    $cadena.= <<< MARCA_FINAL
    <head>
    <meta charset="utf-8">
    <title>CALIFICANDO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  </head>
  <body>
    <h2>Calificaciones</h2>
    <form class="form-horizontal" method="POST">
    <table  width='800' id='calificaciones' class="table table-condensed table-striped">
      <br>
      <tr>
        <td><div class="form-group">
    <label class="col-md-4 control-label" for="">Nombre</label>  
    <div class="col-md-4">
    <input name="N_nombre" type="text" placeholder="Nombre" class="form-control input-md">
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
      </select>
    </div>
  </div></td>
      </tr>
      <tr>
        <td><div class="form-group">
        <label class="col-md-4 control-label" for="">Practica:</label>  
        <div class="col-md-2">
        <input id="" name="practica" type="number" placeholder="" class="form-control input-md">
        </div>
        </div>
        </td>

      <tr>
        <td><div class="form-group">
        <label class="col-md-4 control-label" for="">Parcial:</label>  
        <div class="col-md-2">
        <input id="" name="parcial" type="number" placeholder="" class="form-control input-md"> 
        </div>
        </div>
        </td>
    <tr>
      <td>
      <div class="form-group">
      <label class="col-md-4 control-label" for="">Final:</label>  
      <div class="col-md-2">
      <input id="" name="final" type="number" placeholder="" class="form-control input-md"> 
      </div>
      </div>

      </td>
      <td></td>
    </tr>
    <tr><td> <label class="col-md-4 control-label" for=""></label>
    <input name="enviar" type="submit" value="Enviar">
    <input name="reset" type="reset" value="Limpiar"></td>
    </tr>
  </table>
    <p>
    
    </p>
MARCA_FINAL;
}

else{
    $nom=$_POST["N_nombre"];
    $prac=$_POST["practica"];
    $parc=$_POST["parcial"];
    $fin=$_POST["final"];
    $Promedio='';
    $apro="APROBO";
    $des="DESAPPROBO";
    $condicion='';
    $Njc= ($prac + $parc+ $fin) /3;
    $Npower= ($prac + $parc*2+ $fin*3) /6;
    $Ncsharp= ( $parc+ $fin) /2;
    $cadena1.= "<p>";
      if($_POST["tipo"]=="a"){
        $Promedio = $Njc;

      } 
      elseif($_POST["tipo"]=="b"){

        $Promedio = $Npower;

      }
      else{
        $Promedio = $Ncsharp;
      }
      if($Promedio <= 10.5){
        $condicion = $des;
      } 
      else{ 
        $condicion= $apro;
      }

      $cadena.= <<< MARCA_FINAL
      <meta charset="utf-8">
      <title>CALIFICANDO</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <tr><td><h2>Promedio y condicion</h2></td></tr>
      <td>
      <div class="form-group">
      <label class="col-md-1 control-label" for="">Promedio:</label>  
      <div class="col-md-2">
      <input id="" name="" type="number" placeholder="" class="form-control input-md" value="$Promedio"> 
      </div>
      </div>
      </td>
      <td><div class="form-group">
      <label class="col-md-1 control-label" for="">Condición:</label>  
      <div class="col-md-2">
      <input id="" name="" type="text" placeholder="" class="form-control input-md"value="$condicion"> 
      </div>
      </div>
      </td>
MARCA_FINAL;  

}

?>
<?php
$try= <<< MARCA_FINAL
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Examenes</TITLE>
</HEAD>
<BODY>
$cadena
$cadena1
</BODY>
</HTML>
MARCA_FINAL;

echo $try;
?>