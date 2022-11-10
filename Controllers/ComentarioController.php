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

        public function Add($idReserva, $puntaje, $mensaje)
        {
            $Comentario = new Comentario();
            $Comentario->setIdReserva($idReserva);
            $Comentario->setPuntaje($puntaje);
            $Comentario->setMensaje($mensaje);
            $Comentario->setFecha(date('Y-m-d'));



            $this->ComentarioDAO->Add($Comentario);
        }
    

        public function verComentario($idComentario,$alert=""){

            $datosComentario =$this->ComentarioDAO->GetbyId($idComentario);

            //var_dump($datosComentario);
        
            require_once(VIEWS_PATH."verComentario.php");
        }

        public function ComprobacionComentario ($idGuardian,$idDueno){ ///verifica que tengas reservas finalizadas con ese dueño y sin comentarios ya realizados


            $idReserva = $this->ComentarioDAO->ComprobacionComentario($idGuardian,$idDueno);


            return $idReserva;
        }

    }


    
?>