<?php
   include("config.php");
   session_start();
   
    $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = pg_escape_string($conexion,$_POST['username']);
      $mypassword = pg_escape_string($conexion,$_POST['password']); 
      
      $sql = "SELECT idUsuario FROM usuarios WHERE usuario = '$myusername' and password = '$mypassword'";
      $result = pg_query($conexion,$sql) or die("Error en select: ".pg_last_error());
      $row = pg_fetch_array($result,null,PGSQL_ASSOC);
      //$active = $row['active'];
      
      $count = pg_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>LOGIN admin</title>
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
    <script src="./js/index.js"></script>
    <script src="./js/pdf.js"></script>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
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
    <div>
        <a id="login" class="waves-effect waves-light btn modal-trigger"  href="./index.php">INICIO</a>
    </div>
    </header>
    <main>
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;" align="center  "><b>Inicio de  sesión (Administrador)</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Usuario  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Contraseña  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <div align="center">
                    <button class="btn waves-effect waves-light modal-trigger" type="submit" name="action">Entrar</button>
                </div>
               </form>
               
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

    </main>
    <footer class="page-footer">
    <div class="container center-align">
        Copyright © PGP Developer 2021
    </div>
    </footer>
   </body>
</html>