<?php

namespace Controller;

require_once('src/Exception.php'); //Traits
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class FormularioController{
    
    public function procesarFormulario(){
        if(!empty($_POST['email']) and !empty($_POST['nombre']) and !empty($_POST['comentario'])){
            //empty -> Validar si la variable está instanciada y también tiene datos
            //isset -> Validar si la variable está instanciada
            $email = $_POST['email'];
            $nombre =$_POST['nombre'];
            $comentario = $_POST['comentario'];

            $mail = new PHPMailer(true);
            try{
                //probar enviar el correo
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->Username = "jcanpopcan@gmail.com";
                $mail->Password = "uutvnnwmtanlexmi";
                $mail->CharSet = 'UTF-8';

                $mail->setFrom("jcanpopcan@gmail.com",'De');
                $mail->addAddress("jose.can@intecap.edu.gt",'Para');//A donde se enviará el correo

                $mail->isHTML(true);
                $mail->Subject = "Informacion cursos";

                $mail->Body = "
                Contactar a: <strong>{$nombre}</strong> <br/>
                email: <strong>{$email}</strong> <br/>
                Comentario: <strong>{$comentario}</strong>
                ";
                //$mail->addAttachment('archivo.pdf','archivo.pdf');
                $mail->send();

                echo "
                     <div class='alert alert-success' role='alert'>
                        Correo enviado, te estaremos contactando.
                    </div>
                ";
            }catch(Exception $e){
                echo "Error: {$mail->ErrorInfo}";
            }

        }
        else{
            //header("Location: index.php?action=error");//Redirección
        }
    }

}

?>