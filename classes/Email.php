<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer();
        $this->mailer->isSMTP();
        $this->mailer->SMTPAuth = true;
        $this->mailer->Host = $_ENV['EMAIL_HOST'];
        $this->mailer->Username = $_ENV['EMAIL_USER'];
        $this->mailer->Password = $_ENV['EMAIL_PASS'];
        $this->mailer->Port = $_ENV['EMAIL_PORT'];
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    }

    public function confirmacionRegistro(array $datos){
        $this->mailer->setFrom($_ENV['EMAIL_FROM'], $_ENV['EMAIL_FROM_NAME']);
        $this->mailer->addAddress($datos['email'], $datos['nombres']);
        $this->mailer->isHTML(true);
        $this->mailer->CharSet = "UTF-8";

        $contenido = "<html>
            <body>
                <p><strong>Hola {$datos['nombres']}: </strong></p>
                <p>
                    Gracias por registrarte. Para completar tu registro y activar tu cuenta, por favor utiliza el siguiente enlace de confirmación
                </p>
                <p>
                    <a href='" . $_ENV['APP_URL'] ."/confirmar?token=" . $datos['token'] . " '>Activar mi cuenta</a>
                </p>
                <p>
                    Este paso es necesario para verificar tu correo electrónico.
                </p>
                <p>
                    <em>Si no has solicitado tu registro o consideras que el correo llegó por error, por favor ignora este mensaje.</em>
                </p>
                <p><strong>Equipo " . $_ENV['APP_NAME'] . "</strong></p>
            </body>
        </html>";
        $this->mailer->Subject = "Bienvenido(a) a " . $_ENV['APP_NAME'];
        $this->mailer->Body = $contenido;
        $status = $this->mailer->send();
        return $status;
    }
}