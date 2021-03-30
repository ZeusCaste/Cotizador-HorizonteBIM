<?php
    include('session.php');

    $f1E = $_POST['factor1Economico'];  
    $f2E = $_POST['factor2Economico'];  
    $f3E = $_POST['factor3Economico']; 
    $f1T = $_POST['factor1Tiempo'];  
    $f2T = $_POST['factor2Tiempo'];  
    $f3T = $_POST['factor3Tiempo']; 

    $sql_fac = "UPDATE factores SET FactorRedProyecto = '$f1E', FactorMerProyecto = '$f2E', FactorSitEmProyecto = '$f3E',
                FactorRedTiempo = '$f1T', FactorEficTiempo = '$f2T', FactorCarTiempo = '$f3T' WHERE ID = '1'  ";
    //$result = mysqli_query($db,$sql_fac);

    //$count = mysqli_num_rows($result);

    if(pg_query($conexion,$sql_fac) == true) {
        echo"<script type='text/javascript'>
            alert('Factores editados de manera correcta!');
            </script>";
        console.log("Factores editados");
        header("Location: admin.php");
    }else {
        echo"<script type='text/javascript'>
            alert('Ocurrió un error al editar los factores...');
            </script>";
        console.log("Factores editados");
        header("Location: admin.php");
    }


     //header("Location: admin.php");
?>