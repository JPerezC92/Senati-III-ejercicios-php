<?php
$nom=$_POST["N_nombre"];
$prac=$_POST["practica"];
$parc=$_POST["parcial"];
$fin=$_POST["final"];
$Promedio='';
$Njc= ($prac + $parc+ $fin) /3;
$Npower= ($prac + $parc*2+ $fin*3) /6;
$Ncsharp= ( $parc+ $fin) /2;

?>
<!doctype html>
<html>
<head>
<h2>Promedio y Estado</h2>
  <meta charset="utf-8">
  <title>Proemdio</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
  

      <td>
      <div class="form-group">
      <label class="col-md-4 control-label" for="">Promedio:
        <?php 
        if($_POST["tipo"]=="a"){

          $Promedio = $Njc;
          echo $Promedio;
        } 
        elseif($_POST["tipo"]=="b"){

          $Promedio = $Npower;
          echo $Promedio;
        }
        else{ 
          $Promedio = $Ncsharp;
          echo $Promedio;
        }   
      ?>
      </label>  
      <td><div class="form-group">
      <label class="col-md-4 control-label" for="">Condición:
        <?php 
        if($Promedio <= 10.5){
          echo "DESAPROBADO";
        } 
        else{ 
          echo "APROBADO";
        }
      ?> 
      </label>  
      </div>
      </div>
      </td>
    </tr>

<p>

</p>
</body>
</html>