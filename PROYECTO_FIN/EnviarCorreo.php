<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

   require 'Mailer/Exception.php';
   require 'Mailer/PHPMailer.php';
   require 'Mailer/SMTP.php';

  //Enviar el correo
  $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      
    // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = 'smtp1.gmail.com'; //Para el servidor de correo utilizado 
    $mail->SMTPAuth   = true;              
    $mail->Username   = 'joseramon030299@gmail.com';        
    $mail->Password   = '';      
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;    
    
    //Recipients
    $mail->setFrom('joseramon030299@gmail.com', 'Mailer');
    $mail->addAddress('joseramon030299@hotmail.com', 'Joe User'); 

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperacion o desbloqueo de cuenta';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'El mensaje se envio correctamente ';
} catch (Exception $e) {
    echo "Ocurrio un error {$mail->ErrorInfo}";
}
?>