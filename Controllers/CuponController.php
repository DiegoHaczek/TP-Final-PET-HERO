<?php

    namespace Controllers;

    use Models\Cupon as Cupon;
    use DAO\CuponDAO as CuponDAO;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class CuponController
    {
        private $CuponDAO;

        public function __construct()
        {
            $this->CuponDAO = new CuponDAO();
        }

        public function Add($idReserva)
        {
            $Cupon = new Cupon();
            $Cupon->setReserva($idReserva);
            $Cupon->setMonto($this->CuponDAO->calcularMonto($idReserva));

            $this->CuponDAO->Add($Cupon);
            return $this->CuponDAO->GetIdByReserva($idReserva);
        }  

        public function updateEstado($idCupon){

            //update reserva a 'confirmada'

            $this->CuponDAO->updateEstado($idCupon,"Pagado");

            $alert=['tipo'=>"exito",'mensaje'=>"Reserva Abonada"];

            $controllerHome = new HomeController();
            $controllerHome->index($alert);

        }      
    

        public function verCupon($idCupon,$alert=""){

            $datosCupon =$this->CuponDAO->GetbyId($idCupon);

            //var_dump($datosCupon);
        
            require_once(VIEWS_PATH."vercupon.php");
        }

        public function enviarCupon($idCupon, $mailUsuario){

            try {
                $mail = new PHPMailer();
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'heropet3@gmail.com';                     //SMTP username
                $mail->Password   = 'bdgm dfkc irrz njqp';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                $mail->setFrom('heropet3@gmail.com', 'Pet Hero');
                $mail->addAddress($mailUsuario);
                $mail->Subject = 'Cupon de Pago - Pet Hero';
                $mail->Body = 'Aqui esta el link de pago: 
                http://localhost/TP-FINAL-PET-HERO/cupon/verCupon?id_cupon='.$idCupon.' ';
                $mail->send();
                //echo 'Se mandó el mensaje';
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }

        public function encontrarMail($idReserva){
            $mailUsuario = $this->CuponDAO->encontrarMailDAO($idReserva);
            return $mailUsuario;
        }

    }

    
?>