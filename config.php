<?php
//CONEXION A BASE DE DATOS CON POSTGRES
$usuario =  'pdcowwxyendkdl';
$pass = '695479d78a0ea862dd2daf6eaeadc7a412070dc50f29598efee7d5b74110342e';
$host =  'ec2-34-195-233-155.compute-1.amazonaws.com';
$bd =  'dfnae7o8rakmij';

$conexion = pg_connect( "user=".$usuario." ".
                            "password=".$pass." ".
                            "host=".$host." ".
                            "dbname=".$bd);

if($conexion == false){
    die( "Error al conectar: ".pg_last_error());
}



/* CONEXION A MYSQL

//Database credentials. Assuming you are running MySQL
//server with default setting (user 'root' with no password)
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cotizador');
 
//Attempt to connect to MySQL database 
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}*/
?>