<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>CALIFICANDO</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
  <h2>Calificaciones</h2>
  <form action=ejer6.php class="form-horizontal" method="POST">
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
    <tr><td> <label class="col-md-4 control-label" for=""></label> <input name="enviar" type="submit" value="Enviar">
    <input name="reset" type="reset" value="Limpiar"></td>
    </tr>
</table>
<p>

</p>
</body>
</html>