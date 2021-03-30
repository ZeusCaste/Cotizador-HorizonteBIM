<?php
   include('session.php');
   $sql_fac = "SELECT * FROM factores";
    $result = pg_query($conexion,$sql_fac) or die("Error en select: ".pg_last_error());

   //se despliega el resultado
   while ($row = pg_fetch_assoc($result)){
        $f1E = $row['factorredproyecto'];  
        $f2E = $row['factormerproyecto'];  
        $f3E = $row['factorsitemproyecto']; 
        $f1T = $row['factorredtiempo'];  
        $f2T = $row['factorefictiempo'];  
        $f3T = $row['factorcartiempo'];  
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
        <p><h4>BIM TECHNOLOGY</h4></p>
        <h5>COTIZADOR PARA PROYECTOS DE ARQUITECTURA E INGENIERIAS</h5>
    </div>
  </nav>
    <div class="card-action" align="right">
    <a id="login" class="waves-effect waves-light btn modal-trigger"  href="./logout.php">SALIR</a>
    </div>

    </header>
    <main class="valign-wrapper">
       <div class="container">
       <div class="col s12 m7">
            <div align="center"><h5 class="header">Hola, <?php echo $login_session; ?>. Bienvenido al módulo de Administrador</h5></div>
            <div><div></div></div>
            <p></p>
            <p></p>
            <div>
            <form action="editFac.php" method="POST">
            <div class="row">
            <div><p><div align="center"><h6><b>Factores Económicos</b></h6></div></p></div>
                <div class="input-field col s12 m4 l4">
                    <input value="<?php echo $f1E; ?>" id="f1E" type="text" name="factor1Economico">
                    <label>Factor Reducción Tabulador</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <input value="<?php echo $f2E; ?>" id="f2E" type="text" name="factor2Economico">
                    <label>Factor Mercado</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <input value="<?php echo $f3E; ?>" id="f3E" type="text" name="factor3Economico">
                    <label>Factor Situación de la Empresa</label>
                </div>
                                    
            </div>
            <div class="row">
            <div><p><div align="center"><h6><b>Factores Tiempo de Entrega</b></h6></div></p></div>
                <div class="input-field col s12 m4 l4">
                    <input value="<?php echo $f1T; ?>" id="f1T" type="text" name="factor1Tiempo">
                    <label>Factor de Tabulador</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <input value="<?php echo $f2T; ?>" id="f2T" type="text" name="factor2Tiempo">
                    <label>Factor Eficiencia de la Empresa</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <input value="<?php echo $f3T; ?>" id="f3T" type="text" name="factor3Tiempo">
                    <label>Factor Carga de trabajo Empresa</label>
                </div>               
            </div>
            <div align="center">
            <button class="btn waves-effect waves-light modal-trigger" type="submit" name="action">EDITAR</button>
            </div>
            </form>
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

</html>