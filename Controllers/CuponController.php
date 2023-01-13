<?php

    namespace Controllers;

    use Models\Cupon as Cupon;
    use DAO\CuponDAO as CuponDAO;
    use Exception;
    use Throwable;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
   // use PHPMailer\PHPMailer\Exception;
    Use Controllers\ReservaController as ReservaController;

    class CuponController
    {
        private $CuponDAO;

        public function __construct()
        {
            try {
                $this->CuponDAO = new CuponDAO();
            } catch (Exception $ex) {
                $alert=['tipo'=>"error",'mensaje'=>"Ha Surgido un Inconveniente, intente Nuevamente."];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }

        public function Add($idReserva)
        {
            try {
                $Cupon = new Cupon();
                $Cupon->setReserva($idReserva);
                $Cupon->setMonto($this->CuponDAO->calcularMonto($idReserva));

                $this->CuponDAO->Add($Cupon);
                return $this->CuponDAO->GetIdByReserva($idReserva);
            } catch (Exception $ex) {
                $alert=['tipo'=>"error",'mensaje'=>"No Se Pudo Confirmar la Reserva."];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }  

        public function updateEstado($idCupon,$idReserva){

            //update reserva a 'confirmada'
            try {
                $this->CuponDAO->updateEstado($idCupon,"Pagado");

                $reservaController = new ReservaController();
                $reservaController->updateEstado($idReserva,'Confirmada');
                $alert=['tipo'=>"exito",'mensaje'=>"Reserva Abonada"];

                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            } catch (Exception $ex) {
                $alert=['tipo'=>"error",'mensaje'=>"No Se Pudo Confirmar la Reserva."];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }      
    

        public function verCupon($idCupon,$alert=""){

            try {
                $datosCupon =$this->CuponDAO->GetbyId($idCupon);
                $idDueno =$this->CuponDAO->encontrarIdDuenoDAO($idCupon);

                if(isset($_SESSION['id']) && $idDueno == $_SESSION['id']){ //verifica que este seteada la sesion y sea del user correspondiente
                
    
                    require_once(VIEWS_PATH."vercupon.php");
    
                }else{
    
                    $alert=['tipo'=>"advertencia",'mensaje'=>"Acceso invalido"];
                    $controllerHome = new HomeController();
                    $controllerHome->index($alert);
    
                }
            
               // require_once(VIEWS_PATH."vercupon.php");
            } catch (Exception $ex) {
                $alert=['tipo'=>"error",'mensaje'=>"No Se Puede ver el Cupón"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function enviarCupon($idCupon, $mailUsuario,$nombreUsuario){

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
                $mail->Body = '<div style="display:flex;flex-direction:column;align-items:center;width:600px;height:530px;background-color:rgb(231, 231, 179);">



                <div style="margin-top:3.5em;position:inherit;display:flex;flex-direction: column;justify-content: space-around;width:65%;height:300px;background-color: rgb(245, 255, 240);line-height: 1.6rem;border-radius:5px;">
                
                <h2 style="font-family:Arial;color:#054605;margin-left: 1.3em;margin-bottom: -0.5em;">'.$nombreUsuario.', Tu Cupon de Pago Esta Listo</h2>
        
                <span style="font-family:arial;margin-left: 4.75em;letter-spacing: 1px;width:65%">Haz click en el boton inferior para acceder a tu cupon de pago y confirmar tu reserva </span>
                
                <button style="width:30%;height:11%;align-self:center;margin-bottom: 1em;cursor:pointer;background-color:#628b33;border:none;border-radius:6px;color:white;">
                <a style="color:white;" href="http://localhost/TP-FINAL-PET-HERO/cupon/verCupon?id_cupon='.$idCupon.'">Ver Cupon</a></button>
        
                </div>

                <span style="margin-top:3em;margin-left:3em;">Si no funciona el boton ingresa el siguiente link en el navegador: 
                http://localhost/TP-FINAL-PET-HERO/cupon/verCupon?id_cupon='.$idCupon.'
                </span>

        
                <span style="margin-top:3em;">Pet Heroe - 2022</span>
        
                </div>';
                $mail->IsHTML(true);
                $mail->send();
                //echo 'Se mandó el mensaje';
                
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"No Se Puede Enviar el Cupón"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }

        }

        public function encontrarMail($idReserva){
            try {
                $mailUsuario = $this->CuponDAO->encontrarMailDAO($idReserva);
                return $mailUsuario;
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function encontrarNombre($idReserva){ ///busca nombre guardian por la id de reserva
           
            try{
            $nombreUsuario = $this->CuponDAO->encontrarNombreDAO($idReserva);
            return $nombreUsuario;
            }
            catch (Exception $e){
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }

        }

    }

    
?>