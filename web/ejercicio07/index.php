<?php
    $Cliente = "";
    $Seleccionado = 0;
    $SeleccionadoRam = 0;
    $SeleccionadoDisco = 0;
    $Calcular = 0;
    $TextArea = "";
    $Pentium = "";
    $Ram = "";
    $otros= "";
    $otros1= "";
    $otros2= "";
    $Disco = "";
    if(isset($_POST["calcular"])){
        $este_script = basename(__FILE__);
        $Pentium=$_POST['pentium'];
        $Ram=$_POST['ram'];
        $Disco=$_POST['radio'];
        $Cliente=$_POST['cliente'];
        $otros=$_POST['multi'];
        $otros1=$_POST['impre'];
        $otros2=$_POST['esta'];
        if ($Pentium == 'PENTIUN IV 2.5 GHz'){
            $Seleccionado = 200;
        }elseif ($Pentium == 'PENTIUN IV 3.0 GHz'){
            $Seleccionado = 250;
        }else{
            $Seleccionado = 300;
        }
        if ($Ram == 'RAM 256 Mb'){
            $SeleccionadoRam = 80;
        }elseif ($Ram == 'RAM 512 Mb'){
            $SeleccionadoRam = 100;
        }else{
            $SeleccionadoRam = 140;
        }
        if ($Disco== 'HD 40 Gb'){
            $SeleccionadoDisco = 45;
        }
        elseif ($Disco== 'HD 60 Gb'){
            $SeleccionadoDisco = 60;
        }elseif ($Disco== 'HD 80 Gb'){
            $SeleccionadoDisco = 70;
        }else{
            $SeleccionadoDisco = 90;
        }
        if ($otros=='MULTIMEDIA'){
            $MULTIMEDIA = 45;
        }else{
            $MULTIMEDIA = 0;
        }
        if($otros1=='IMPRESORA'){
            $IMPRESORA=110;
        }else{
            $IMPRESORA=0;
        }
        if($otros2=='ESTABILIZADOR'){
            $ESTABILIZADOR=15;
        }else{
            $ESTABILIZADOR=0;
        }
        $Total= $Seleccionado + $SeleccionadoRam + $SeleccionadoDisco + $MULTIMEDIA + $IMPRESORA + $ESTABILIZADOR;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <form class="form-horizontal" method="POST">
    <form class="form-horizontal" method="POST">
    <table  width='800' id='radio' class="table table-condensed table-striped">
    <tr>
        <td colspan='2'><div class="form-group"><br>
                <label class="col-md-4 control-label" for="">Cliente:</label>  
                <div class="col-md-4">
                <input name="cliente" type="text" class="form-control input-md" value='<?php echo $Cliente?>'>
                </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                <label class="col-md-4 control-label" for="">PENTIUM</label>
                <div class="col-md-4">
                <select id="pentium" name="pentium" class="form-control">
                <option value="PENTIUN IV 2.5 GHz">Pentium IV 2.5 GHz</option>
                <option value="PENTIUN IV 3.0 GHz">Pentium IV 3.0 GHz</option>
                <option value="PENTIUN IV 4.0 GHz">Pentium IV 4.0 GHz</option>
                </select>
                </div>
                </div>
            </td>
            <td>
                <div class="form-group">
                <label class="col-md-4 control-label" for="">RAM</label>
                <div class="col-md-4">
                <select id="ram" name="ram" class="form-control">
                <option value="RAM 256 Mb">256 Mb</option>
                <option value="RAM 512 Mb">512 Mb</option>
                <option value="RAM 1.0 Gb">1.0 Gb</option>
                </select>
                </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <form class="form-horizontal">
                <fieldset>
                <!-- Form Name -->
                <legend>Disco Duro</legend>
                    <!-- Multiple Radios -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="disco">
                        </label>
                            <div class="col-md-4">
                            <div class="radio">
                            <input type="radio" name="radio" id="radio" value="HD 60 Gb">60 Gb &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                        <input type="radio" name="radio" id="radio" value="HD 40 Gb">40 Gb
                            <div class="radio">
                            <input type="radio" name="radio" id="radio" value="HD 120 Gb">120 Gb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio" id="radio" value="HD 80 Gb">80 Gb
                    </div>                                
                </fieldset>
</form>
            </td>
            <td>
                
            <form class="form-horizontal">
                <fieldset>
                <!-- Form Name -->
                <legend>OTROS</legend>
                    <!-- Multiple Radios -->
                    <!-- Multiple Checkboxes -->
                <div class="form-group">
                    <label class="col-md-4 control-label">
                    </label>
                        <div class="col-md-4">
                            <input type="checkbox" name="multi" id="multi" value="MULTIMEDIA">MULTIMEDIA
	                        <br>               
                            <input type="checkbox" name="impre" id="impre" value="IMPRESORA">IMPRESORA
                            <br>
                            <input type="checkbox" name="esta" id="esta" value="ESTABILIZADOR">ESTABILIZADOR
	                    </div>
                </div>
                </fieldset>
            </form>
            </td>
        </tr>
        <tr>
                <td colspan='2'>                                                     
                        <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-2">
                                <button id="" name="calcular" class="btn btn-info">CALCULAR</button>  
                            </div>
                            <div class="col-md-1">
                                <input id="" name="" type="number" placeholder="" class="form-control input-md" value='<?php echo $Total?>'>  
                            </div>
                            </div>
                </td>
        </tr>
        <tr>
            <td colspan='2'>
                
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-1 control-label" for=""></label>
  <div class="col-md-9">                     
    <textarea class="form-control" id="" name=" " ><?php echo $Cliente;echo '  '; echo $Pentium;echo '  '; echo $Ram;echo '  '; echo $Disco; echo '  '; echo $otros; echo '  '; echo $otros1; echo '  '; echo $otros2?></textarea>
  </div>
</div>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="" name="agregar" class="btn btn-success">AGREGAR</button>
    <button id="" name="listar" class="btn btn-warning">LISTAR</button>
    <button id="" name="cerrar" class="btn btn-danger">CERRAR</button>
  </div>
</div></td>
        </tr>
</form></form>
        </table>
</body>
</html>