<?php
    namespace Controllers;

    use Models\Comentario as Comentario;
    use DAO\ComentarioDAO as ComentarioDAO;

    class ComentarioController
    {
        private $ComentarioDAO;

        public function __construct()
        {
            $this->ComentarioDAO = new ComentarioDAO();
        }

        public function Add($idReserva, $puntaje, $mensaje, $fecha)
        {
            $Comentario = new Comentario();
            $Comentario->setIdReserva($idReserva);
            $Comentario->setPuntaje($puntaje);
            $Comentario->setMensaje($mensaje);
            $Comentario->setFecha($fecha);

            $this->ComentarioDAO->Add($Comentario);
        }
    

        public function verComentario($idComentario,$alert=""){

            $datosComentario =$this->ComentarioDAO->GetbyId($idComentario);

            //var_dump($datosComentario);
        
            require_once(VIEWS_PATH."verComentario.php");
        }

    }

    
?>