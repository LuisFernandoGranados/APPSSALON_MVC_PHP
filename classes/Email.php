<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;



class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

         // create a new object
         $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
         
       /*  require 'path_to/PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Host de Gmail SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'tucorreo@gmail.com';  // Tu dirección de correo de Gmail
        $mail->Password = 'tu_clave_para_aplicaciones';  // La clave para aplicaciones generada en Gmail
        $mail->Port = 587;  // Puerto de Gmail SMTP
        
        // Configura el contenido del correo y los destinatarios
        $mail->setFrom('tucorreo@gmail.com', 'Tu Nombre');
        $mail->addAddress('destinatario@email.com', 'Nombre Destinatario');
        $mail->Subject = 'Asunto del correo';
        $mail->Body = 'Contenido del correo';
        
        // Envía el correo
        if (!$mail->send()) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        } else {
            echo 'Correo enviado exitosamente.';
        }
 */

        
         
 
  
        

       
     
         $mail->setFrom('cuentas@appsalon.com');
         $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
         $mail->Subject = 'Confirma tu Cuenta';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contenido = '<html>';
         $contenido .= "<p><strong>Hola " . $this->email .  "</strong> Has Creado tu cuenta en Barberia Carbajal, solo debes confirmarla presionando el siguiente enlace</p>";
         $contenido .= "<p>Presiona aquí: <a href='" .  $_ENV['APP_URL']   . "/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";        
         $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
         $contenido .= '</html>';
         $mail->Body = $contenido;

         //Enviar el mail
         $mail->send();

    }



    public function enviarInstrucciones(){


        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
         
        

       
     
         $mail->setFrom('cuentas@appsalon.com');
         $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
         $mail->Subject = 'Restablece tu password';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contenido = '<html>';
         $contenido .= "<p><strong>Hola ".$this->nombre. "</strong>Has solicitado reestablecer tu password,
         sigue el siguiente enlace para hacerlo.</p>";
         $contenido .= "<p>Presiona aquí: <a href='" .  $_ENV['APP_URL']  ."/recuperar?token=" . $this->token . "'>Restablecer Password</a>";        
         $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
         $contenido .= '</html>';
         $mail->Body = $contenido;

         //Enviar el mail
         $mail->send();
    }

  
}


