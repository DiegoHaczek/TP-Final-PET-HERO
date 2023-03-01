<?php
    namespace Controllers;

    use Models\Comentario as Comentario;
    use DAO\ComentarioDAO as ComentarioDAO;
    use Exception;
    use Throwable;
    use Controllers\HomeController as HomeController;


    class ComentarioController
    {
        private $ComentarioDAO;

        public function __construct()
        {
            try {
                $this->ComentarioDAO = new ComentarioDAO();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function Add($idReserva, $puntaje, $mensaje)
        {
            try {
                $Comentario = new Comentario();
                $Comentario->setIdReserva($idReserva);
                $Comentario->setPuntaje($puntaje);
                $Comentario->setMensaje($mensaje);
                $Comentario->setFecha(date('Y-m-d'));

                $this->ComentarioDAO->Add($Comentario);

                
                $alert=['tipo'=>"exito",'mensaje'=>"Comentario Realizado con Éxito"];
                $homeController = new HomeController;
                $homeController->Index($alert);
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error al publicar el comentario"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }
    
        public function verComentario($idComentario,$alert=""){

            try {
                $datosComentario =$this->ComentarioDAO->GetbyId($idComentario);
                require_once(VIEWS_PATH."verComentario.php");
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function ComprobacionComentario ($idGuardian,$idDueno){ ///verifica que tengas reservas finalizadas con ese dueño y sin comentarios ya realizados
            try {
                $idReserva = $this->ComentarioDAO->ComprobacionComentario($idGuardian,$idDueno);
                return $idReserva;
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

    }


    
?>