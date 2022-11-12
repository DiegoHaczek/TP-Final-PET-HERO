<?php

    namespace Controllers;

    use Models\Cupon as Cupon;
    use DAO\CuponDAO as CuponDAO;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    Use Controllers\ReservaController as ReservaController;

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

        public function updateEstado($idCupon,$idReserva){

            //update reserva a 'confirmada'

            $this->CuponDAO->updateEstado($idCupon,"Pagado");

            $reservaController = new ReservaController();
            $reservaController->updateEstado($idReserva,'Confirmada');
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
                $mail->Username   = 'heropet4@gmail.com';                     //SMTP username
                $mail->Password   = 'zpgt udsn lnaa jaun';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                $mail->setFrom('heropet3@gmail.com', 'Pet Hero');
                $mail->addAddress($mailUsuario);
                $mail->Subject = 'Cupon de Pago - Pet Hero';
                /*$mail->Body = 'Aqui esta el link de pago: 
                http://localhost/TP-FINAL-PET-HERO/cupon/verCupon?id_cupon='.$idCupon.' ';*/
                $mail->Body = '<div style="display:flex;flex-direction:column;align-items:center;width:600px;height:450px;background-color:rgb(231, 231, 179);">



                <div style="margin-top:3.5em;position:inherit;display:flex;flex-direction: column;justify-content: space-around;width:65%;height:300px;background-color: rgb(245, 255, 240);line-height: 1.6rem;border-radius:5px;">
                
                <h2 style="font-family:Arial;color:#054605;margin-left: 1.3em;margin-bottom: -0.5em;">NOMBRE, Tu Cupon de Pago Esta Listo</h2>
        
                <span style="font-family:arial;margin-left: 4.75em;letter-spacing: 1px;width:65%">Haz click en el boton inferior para acceder a tu cupon de pago y confirmar tu reserva </span>
                
                <button style="width:30%;height:11%;align-self:center;margin-bottom: 1em;cursor:pointer;background-color:#628b33;border:none;border-radius:6px;color:white;">
                <a href="http://localhost/TP-FINAL-PET-HERO/cupon/verCupon?id_cupon='.$idCupon.'">Ver Cupon</a></button>
        
                </div>
        
                <span style="margin-top:3em;">Pet Heroe - 2022</span>
        
                </div>';
                $mail->IsHTML(true);
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