<?php

    include('config.php');
    include("./php/fpdf182/fpdf.php");
    include_once('CPDF.php');

    $sql_fac = "SELECT * FROM cotizaciones";
    $result = pg_query($conexion,$sql_fac) or die("Error en select: ".pg_last_error());

    setlocale(LC_ALL,"es_MX");
    $fecha = date("d/m/Y");

    $email = "zeus_96_coss@hotmail.com";
    $email2 = "mbarrientosl@yahoo.com.mx";

    $pdf = new PDF();
    $pdf->AddPage();
    //Margen iniciando en 0, 0
    //$pdf->Image('fondo.jpg', 0,0, 210, 295, 'JPG');
    
    //De aqui en adelante se colocan distintos métodos
    //para diseñar el formato.
    
    //Fecha
    $pdf->SetFont('Times','', 12);
    $pdf->SetXY(130,40);
    $pdf->Cell(15, 8, utf8_decode("$fecha"), 0, 'L');//insertar variable de FECHA
    

    $pdf->SetXY(20, 50);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(20, 8, "Historial de Cotizaciones", 0, 'L');
    $pdf->SetFont('Times', '', 12);
    //*****
    $pdf->Ln(7);
    $pdf->Cell(12, 10, 'ID', 1, 0, 'C', 0);
    $pdf->Cell(45, 10, 'Nombre', 1, 0, 'C', 0);
    $pdf->Cell(50, 10, 'Email', 1, 0, 'C', 0);
    $pdf->Cell(45, 10, utf8_decode("Teléfono"), 1, 0, 'C', 0);
    $pdf->Cell(43, 10, 'Fecha', 1, 1, 'C', 0);

    while ($mostrar = pg_fetch_assoc($result)){
        $pdf->Cell(12, 10, $mostrar['idcotizacion'], 1, 0, 'C', 0);
        $pdf->Cell(45, 10, $mostrar['nombreus'], 1, 0, 'C', 0);
        $pdf->Cell(50, 10, $mostrar['correous'], 1, 0, 'C', 0);
        $pdf->Cell(45, 10, $mostrar['numerous'], 1, 0, 'C', 0);
        $pdf->Cell(43, 10, $mostrar['fecha'], 1, 1, 'C', 0); 
    }

    $doc = $pdf->Output('','S'); //Salida al navegador

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();       
    $mail->SMTPDebug = 0;                                     //Send using SMTP
    $mail->Host = gethostbyname('smtp.gmail.com');                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pruebasbimcotizador@gmail.com';                     //SMTP username
    $mail->Password   = 'Hola123.';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );                            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('zeuscaste@gmail.com', 'BIM Technology Solutions');
    $mail->addAddress($email);     //Add a recipien
    $mail->addAddress($email2);     //Add a recipien
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "BIM Technology Solutions";
    $mail->Body = "<b>Reporte de cotizaciones del día '$fecha'</b> <br><b>Cotizador BIM Technology Solutions.</b></br>";

    // definiendo el adjunto 
    $mail->AddStringAttachment($doc, 'CotizacionesBIM.pdf', 'base64');

    $mail->send();
    $enviado =" ".$email;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>