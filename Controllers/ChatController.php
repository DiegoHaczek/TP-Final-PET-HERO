<?php
    namespace Controllers;

    use Models\Chat as Chat;
    use DAO\ChatDAO as ChatDAO;
    use Exception;
    use Throwable;
    use Controllers\HomeController as HomeController;
    use Controllers\ChatController as ChatController;


    class ChatController
    {
        private $ChatDAO;

        public function __construct()
        {
            try {
                $this->ChatDAO = new ChatDAO();
            } catch (Exception $ex) {
                $alert=['tipo'=>"error",'mensaje'=>"Ha Surgido un Inconveniente, intente Nuevamente."];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }

        public function mostrarChat ($idReserva = "",$numeroConversacion = "", $alert = ""){

            $controllerChat = new ChatController ();

            ($_SESSION['type'] == 'd')?  $controllerChat->mostrarChatDueno($idReserva,$numeroConversacion)
                                      :  $controllerChat->mostrarChatGuardian($idReserva,$numeroConversacion);

        }

        public function mostrarChatDueno ($idReserva = "",$numeroConversacion = "",$alert=""){

            try {

                $id=$_SESSION["id"];
                $ChatList = $this->ChatDAO->GetChatListDueno($id);

                if ($idReserva == "" && $ChatList){ //conversacion que sale por defecto si no se selecciona ninguna Y hay conversaciones

                    $Mensajes = $this->ChatDAO->GetMensajes($ChatList[0]['id_reserva']);

                }else if($idReserva != ""){
                    
                    $Mensajes = $this->ChatDAO->GetMensajes($idReserva);} // conversacion que sale si se selecciono una de la lista
                    else{$Mensajes=null;}

                    
                require_once(VIEWS_PATH."chat.php");    

            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }

        public function mostrarChatGuardian ($idReserva = "",$numeroConversacion = "",$alert=""){

            try {

                $id=$_SESSION["id"];
                $ChatList = $this->ChatDAO->GetChatListGuardian($id);

                if ($idReserva == "" && $ChatList){ //conversacion que sale por defecto si no se selecciona ninguna Y hay conversaciones

                    $Mensajes = $this->ChatDAO->GetMensajes($ChatList[0]['id_reserva']);

                }else if($idReserva != ""){
                    
                    $Mensajes = $this->ChatDAO->GetMensajes($idReserva);} // conversacion que sale si se selecciono una de la lista
                    else{$Mensajes=null;}

                    
                require_once(VIEWS_PATH."chat.php");    

            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }

        public function Add($idReserva,$Mensaje,$emisor,$numeroConversacion){

            try {

                $Chat = new Chat ();
                $Chat->setIdReserva($idReserva);
                $Chat->setMensaje($Mensaje);
                $Chat->setEmisor($emisor);
                $this->ChatDAO->Add($Chat);

                $ChatController= new ChatController();
                $ChatController->mostrarChat($idReserva,$numeroConversacion);

            } catch (Exception $e) {
                var_dump($Chat);
                $alert=['tipo'=>"error",'mensaje'=>'Error al enviar el Mensaje'];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }

        }
    }


    
?>