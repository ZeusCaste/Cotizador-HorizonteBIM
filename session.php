<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = pg_query($conexion,"select nombre from usuarios where usuario = '$user_check' ");
   
   $row = pg_fetch_array($ses_sql,PGSQL_ASSOC);
   
   $login_session = $row['nombre'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>