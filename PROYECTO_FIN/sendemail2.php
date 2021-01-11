<?php
function sendemail2($imp,$genv,$des,$txt_sub,$txt_tot,$txt_pago,$mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress, $template){
	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
	$mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar 
	$mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
	$mail->Username = $mail_username;        
	$mail->Password = $mail_userpassword; 		// Tu contraseña de gmail
	$mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
	$mail->Port = 587;                          // Puerto TCP  para conectarse 
	$mail->setFrom($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
	$mail->addReplyTo($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($mail_addAddress);   // Agregar quien recibe el e-mail enviado
	$message = file_get_contents($template);
	$message = str_replace('{{first_name}}', $mail_setFromName, $message);
	//$message = str_replace('{{totprod}}', $txt_message, $message);
	$message = str_replace('{{impuestos}}', $imp, $message);
    $message = str_replace('{{genvio}}', $genv, $message);
    $message = str_replace('{{descuento}}', $des, $message);
    $message = str_replace('{{sub}}', $txt_sub, $message);
    $message = str_replace('{{total}}', $txt_tot, $message);
    $message = str_replace('{{mpago}}', $txt_pago, $message);
	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
	
	$mail->Subject = "Ticket de compra";
	$mail->msgHTML($message);
	if(!$mail->send()) {
              echo '<center>';
		      echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
              echo '<strong>Lo sentimos tu correo no fue enviado</strong>';
              echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
              echo    '<span aria-hidden="true">&times;</span>';
              echo  '</button>';
              echo   '</div>';
              echo '</center>';
		//echo '<p style="color:red">No se pudo enviar el mensaje..';
		//echo 'Error de correo: ' . $mail->ErrorInfo."</p>";
	} else {
              echo '<center>';
		      echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">';
              echo '<strong>El ticket ha sido enviado a tu correo</strong>';
              echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
              echo    '<span aria-hidden="true">&times;</span>';
              echo  '</button>';
              echo   '</div>';
              echo '</center>';
	}
}
?>