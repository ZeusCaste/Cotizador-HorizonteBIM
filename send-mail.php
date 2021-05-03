<?php

include('config.php');

$nombre= $_POST["nombreC"]; 
$email=$_POST["email"];
$telefono=$_POST["numT"];

setlocale(LC_ALL,"es_MX");
$fecha = date("m/d/Y");
$hora = date("H:i:s");

$sql_fac = "INSERT into cotizaciones ( nombreus, correous, numerous, fecha, hora) VALUES ('$nombre','$email','$telefono','$fecha', '$hora')";
$result = pg_query($conexion,$sql_fac) or die("Error en insert: ".pg_last_error());

if($result == true) {
  echo"<script type='text/javascript'>
    alert('¡Se guardo su cotizacion correctamente!');
    </script>";
}else {
  echo"<script type='text/javascript'>
    alert('Ocurrió un error al guardar su cotizacion');
    </script>";
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Cotizador BIM</title>
    <meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no' />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="./images/logo.jpeg" rel="icon">
    <link href="./images/logo.jpeg" rel="apple-touch-icon">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="./plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./plugins/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="./plugins/validetta/validetta.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link href="./css/general.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="./plugins//jquery-3.4.1.min.js"></script> -->
    <script src="./plugins/materialize/js/materialize.min.js"></script>
    <script src="./plugins/validetta/validetta.js"></script>
    <script src="./plugins/validetta/validetta.min.js"></script>
    <script src="./plugins/validetta/validettaLang-es-ES.js"></script>
    <script src="./plugins/confirm/jquery-confirm.min.js"></script>

</head>

<body>
    <header>
    <nav class="nav-extended ">
    <div class="nav-wrapper center-align ">
     <span> <i class="fas fa-pencil-ruler fa-4x"></i><i class="fas fa-lightbulb fa-4x"></i><i class="fas fa-user-edit fa-4x"></i></span>
    </div>
    <div class="nav-content center-align">
      <span class="nav-title ">COTIZADOR ARQUITECTURA Y ESTRUCTURA</span>
    
    </div>
  </nav>

    </header>
    <main class="valign-wrapper">
       <div class="container">
       <div class="col s12 m7">
    <h2 class="header">Hola <?php echo$nombre ?> </h2>
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">
          <p>Se ha enviado un archivo PDF al correo: <?php echo$email;?> </p>
          <br>
          <i class="fas fa-envelope-open-text fa-7x fa-spin"></i>
        </div>
        <div class="card-action">
          <a href="./">CONTINUAR</a>
        </div>
      </div>
    </div>
  </div>

   
</div>
    </main>
    <footer class="page-footer">

        <div class="container center-align">
            Copyright © PGP Developer 2021
        </div>
        </div>
    </footer>

</body>

<script>
    M.AutoInit();
</script>
</html>